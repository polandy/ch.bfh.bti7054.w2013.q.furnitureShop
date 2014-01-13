<?php

namespace service;

/**
 * Class OrderService
 * @package service
 * Service layer for Order
 */
class OrderService extends AbstractService
{

    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @return an instance of the OrderService
     */
    public static function getInstance()
    {
        if (is_null(static::$instance) || !static::$instance instanceof OrderService) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     *
     * @param $user
     * @return finds the opened cart. if there is none, a new one will be created
     */
    public function findOrCreateOpenedOrder($user)
    {
        $order = $this->findOpenOrderByUser($user);
        if ($order == null) {
            $sth = $this->getDBH()->prepare("INSERT INTO `Order` (isOpen, userId) VALUES (1, :userId);");
            $sth->bindValue('userId', $user->getId());
            $sth->execute();
            return $this->findOpenOrderByUser($user);
        } else {
            return $order;
        }
    }

    /**
     * Get the currently open order of a user
     * @param $user
     * @return mixed
     */
    private function findOpenOrderByUser($user)
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM `Order` WHERE userId = :userId AND isOpen = 1;");
        $sth->bindValue('userId', $user->getId());
        $sth->execute();
        $list = $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\User");
        if (sizeof($list) > 0) {
            return $list[0];
        }
    }

    /**
     * Find an OrderFurniture
     * @param $order
     * @param $furniture
     * @param $feature
     * @return OrderFurniture
     */
    public function findOrderFurniture($order, $furniture, $feature)
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM order_furniture WHERE orderId = :orderId AND furnitureId = :furnitureId AND featureId " . ($feature == null ? "IS NULL" : "= :featureId"));
        $sth->bindValue('orderId', $order->getId());
        $sth->bindValue('furnitureId', $furniture->getId());
        if ($feature != null)
            $sth->bindValue('featureId', $feature == null ? null : $feature->getId());
        $sth->execute();
        $list = $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\OrderFurniture");
        if (sizeof($list) > 0) {
            return $list[0];
        }
        return null;
    }

    /**
     * Find an Order by id
     * @param id
     * @return Order
     */
    public function findOrderById($id)
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM `order` WHERE id = :id;");
        $sth->bindValue('id', $id);
        $sth->execute();
        $list = $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\Order");
        if (sizeof($list) > 0) {
            return $list[0];
        }
        return null;
    }

    /**
     * Find an OrderFurniture by id
     * @param id
     * @return OrderFurniture
     */
    public function findOrderFurnitureById($id)
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM order_furniture WHERE id = :id;");
        $sth->bindValue('id', $id);
        $sth->execute();
        $list = $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\OrderFurniture");
        if (sizeof($list) > 0) {
            return $list[0];
        }
        return null;
    }

    /**
     * Find all OrderFurniture that belong to an order
     * @param $order
     * @return OrderFurniture
     */
    public function findAllOrderFurnitures($order)
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM order_furniture WHERE orderId = :orderId");
        $sth->bindValue('orderId', $order->getId());
        $sth->execute();
        $list = $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\OrderFurniture");
        return $list;
    }

    /**
     * Update the quantity of a furniture in an order
     * @param $orderFurniture reference to a OrderFurniture
     * @param $quantity the new quantity
     */
    public function updateOrderFurnitureQuantity($orderFurniture, $quantity)
    {
        $sth = $this->getDBH()->prepare("UPDATE order_furniture SET quantity = :quantity WHERE id = :id");
        $sth->bindValue('id', $orderFurniture->id);
        $sth->bindValue('quantity', $quantity);
        $sth->execute();
        $orderFurniture->quantity = $quantity;
    }

    /**
     * Remove a OrderFurniture
     * @param $orderFurniture reference to a OrderFurniture
     */
    public function removeFurnitureQuantity($orderFurniture)
    {
        $sth = $this->getDBH()->prepare("DELETE FROM order_furniture WHERE id = :id");
        $sth->bindValue('id', $orderFurniture->id);
        $sth->execute();
    }


    /**
     * Get the total price of an order
     * @param $order reference to an Order
     */
    public function getTotalOrderPrice($order)
    {
        $sth = $this->getDBH()->prepare("
            SELECT SUM( quantity * ( basicPrice + IFNULL( extraPrice, 0 ) ) ) totalPrice
            FROM `order`
            INNER JOIN order_furniture ON orderId = `order`.id
            INNER JOIN furniture ON furnitureId = furniture.id
            LEFT JOIN feature ON featureId = feature.id
            WHERE `order`.id = :id");
        $sth->bindValue('id', $order->id);
        $sth->execute();
        $row = $sth->fetch();
        return $row["totalPrice"];
    }

    /** Confirm the order and send a confirmation email
     * @param $order the Order
     * @param $paymentMethod the selected payment method
     */
    public function confirmOrder($order, $paymentMethod)
    {
        $sth = $this->getDBH()->prepare("UPDATE `order` SET orderDate = now(), isOpen = 0, paymentMethodId = :paymentmethod_id WHERE id = :id");
        $sth->bindValue('id', $order->id);
        $sth->bindValue('paymentmethod_id', $paymentMethod->id);
        $sth->execute();
        $order = $this->findOrderById($order->id);

        $userService = \service\UserService::getInstance();
        $msgService = MsgService::getInstance();
        $config = \Config::getInstance();
        $user = $userService->findUserById($order->userId);
        $orderFurnitures = $this->findAllOrderFurnitures($order);

        // Create the PDF
        $pdf = new \service\PDFOrderService();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 15);
        $pdf->OrderHeader($order, $user);
        $pdf->FurnitureTable($orderFurnitures);
        $pdf->OrderFooter($this->getTotalOrderPrice($order));
        $pdffile = tempnam(sys_get_temp_dir(), "mob");
        $pdf->Output($pdffile, "F");
        $mailBody = "<html><body><p>" . $msgService->getName("email_dear") . " " . $user->firstName . " " . $user->lastName . "<br>" . $msgService->getName("email_text") . "</p></body></html>";
        $this->sendConfirmationMail($user->email, $mailBody, $pdffile);
        $this->sendConfirmationMail($config->email, "An order has been opened by a customer.", $pdffile);
        unlink($pdffile);
    }

    /**
     * Email the order confirmation PDF
     * @param $to
     * @param $text
     * @param $file
     * @return bool
     */
    private function sendConfirmationMail($to, $text, $file)
    {
        $msgService = MsgService::getInstance();
        $config = \Config::getInstance();
        global $error;
        $mail = new \PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = $config->smtp;
        $mail->Port = $config->smtp_port;
        $mail->Username = $config->email;
        $mail->Password = $config->email_pw;
        $mail->SetFrom($config->email, "Moebius furniturus");
        $mail->Subject = $msgService->getName("email_subject");
        $mail->Body = $text;
        $mail->IsHTML(true);
        $mail->AddAddress($to);
        $mail->AddAttachment($file, "order.pdf");
        if (!$mail->Send()) {
            $error = 'Mail error: ' . $mail->ErrorInfo;
            echo $error;
            return false;
        } else {
            return true;
        }
    }

    /** Remove an order
     * @param $order
     */
    public function clearOrder($order)
    {
        $sth = $this->getDBH()->prepare("DELETE FROM `order` WHERE id = :id");
        $sth->bindValue('id', $order->id);
        $sth->execute();
    }

    /**
     * adds a furniture with an optional feature to the cart
     * @param $furniture Reference to a Furniture
     * @param $feature Reference to a Feature
     */
    public function addToOrder($furniture, $feature)
    {
        // get opened cart or create a new one
        $order = $this->findOrCreateOpenedOrder(\Config::getInstance()->getUser());

        $orderFurniture = $this->findOrderFurniture($order, $furniture, $feature);
        if ($orderFurniture != null) {
            $this->updateOrderFurnitureQuantity($orderFurniture, $orderFurniture->quantity + 1);
        } else {
            $sql = "INSERT INTO order_furniture (orderId, furnitureId, featureId) VALUES (:orderId, :furnitureId, :featureId)";
            $sth = $this->getDBH()->prepare($sql);
            $featureId = $feature == null ? null : $feature->getId();
            $sth->bindValue('orderId', $order->getId());
            $sth->bindValue('furnitureId', $furniture->getId());
            $sth->bindValue('featureId', $featureId);
            $sth->execute();
        }
    }

}