<?php

/**
 * Class Messages
 * This class is a singleton and provides all labels for the website in all supported languages in a map.
 */
class Messages
{
    # singleton instance
    private static $instance;

    public static function getInstance()
    {
        if (is_null(self::$instance))
            self::$instance = new Messages();
        return self::$instance;
    }

    /**
     * @return array|map containing all messages in all supported languages
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @var map with all messages in all supported languages.
     * Supported languages at the moment: de, en
     * index 0 -> de
     * index 1 -> en
     */
    var $messages = array(
        'article_features' => array('Features', 'Features'),
        'accessDenied' => array('Sie haben keine Berechtigung auf diese Seite zuzugreifen', 'You are not allowed to access this page'),
        'savedSuccess' =>
            array('Erfolgreich gespeichert!', 'Saved successfully'),
        'notAllAttributesSet' =>
            array('Nicht alle Attribute wurden entsprechend gesetzt.', 'Not all attributes has been set properly.'),
        'addToCart' =>
            array('In den Warenkorb', 'Add to Cart'),
        'cart' => array('Warenkorb', 'Cart'),
        'invalidUrl' =>
            array("Fehlerhafte URL.", "Invalid URL."),
        'edit' =>
            array('Bearbeiten', 'Edit'),
        'homepage' => array(
            "<h4 class=\"subheader\">Zuhause sein?</h4>
            <h4 class=\"subheader\">Sich wohl fühlen?</h4>
            <h4 class=\"subheader\">Wir richten es ein!</h4>",
            "<h4 class=\"subheader\">Be at home?</h4>
            <h4 class=\"subheader\">Feel comfortable?</h4>
            <h4 class=\"subheader\">We furnish it!</h4>"),
        "category_admin_success" => array("Kategorie wurde erfolgreich angelegt", "Category successfully created"),
        "error_unexpectedError" =>  array("Ein Fehler ist aufgetreten, wenden Sie sich an den Administrator, falls der Fehler nochmals auftritt",
                                    "An error occured. Contact the administrator if the error occurs again."),
        "furniture_create" => array("Ein neues Möbel erstellen", "Create a new furniture"),
        "furniture_edit" => array("Ein Möbel bearbeiten", "Edit furniture"),
        "furniture_admin" => array("Admin Möbel", "Admin furniture"),
        "furniture_creatBtn" => array("Erstellen", "Create"),
        "furniture_save" => array("Speichern", "Save"),
        "furniture_notFound" => array("Angegebenes Möbel wurde nicht gefunden", "Given Furniture ist not available."),
        "furniture_category" => array("Kategorie", 'Category'),
        "furniture_nameDe" => array("Deutsche Bezeichnung", 'German name'),
        "furniture_nameEn" => array("Englische Bezeichnung", 'English name'),
        "furniture_price" => array("Preis", 'Price'),
        "furniture_descriptionDe" => array("Deutsche Beschreibung", 'German description'),
        "furniture_descriptionEn" => array("Englische Beschreibung", 'English description'),
        "furniture_feature_add" => array("Feature hinzufügen", 'Add Feature'),
        "furniture_feature_descDe" => array("Beschreibung DE", 'Description ger'),
        "furniture_feature_descEn" => array("Beschreibung EN", 'Description en'),
        "furniture_feature_additionalPrice" => array("Preiszuschlag", 'Additional price'),
        "furniture_feature_btnLabel" => array("Speichern", 'Save'),
        "furniture_feature_list" => array("Verfügbare Features", 'Avaliable features'),
        "furniture_imgUrl" => array("Bild URL", 'Img URL'),

        "pdf_title" => array("Ihre Bestellung", 'Order confirmation'),
        "pdf_furniture" => array("Möbel", 'Furniture'),
        "pdf_feature" => array("Extra", 'Feature'),
        "pdf_quantity" => array("Anzahl", 'Quantity'),
        "pdf_price" => array("Preis", 'Price'),
        "pdf_orderDate" => array("Bestelldatum", "Order date"),
        "pdf_totalPrice" => array("Total", "Total"),
        "pdf_paymentMethod" => array("Zahlungsart", "Payment method"),
        "pdf_" => array("", ""),
        "pdf_" => array("", ""),

        "email_subject" => array("Ihre Bestellung", "Order confirmation"),
        "email_dear" => array("Guten Tag", "Dear"),
        "email_text" => array("Ihre Bestellung wurde entgegenommen. Eine Bestellüberischt finden Sie im Anhang.<br><br>Besten Dank", "Your order is confirmed. Please find the order overview in the attachment.<br><br>Best regards"),
        "email_" => array("", ""),

        "cart_title" => array("Warenkorb", "Shopping cart"),
        "cart_furniture" => array("Möbel", "Furniture"),
        "cart_feature" => array("Extra", "Feature"),
        "cart_quantity" => array("Anzahl", "Quantity"),
        "cart_singlePrice" => array("Preis für 1 Stück", "Price for one"),
        "cart_price" => array("Preis", "Price"),
        "cart_remove" => array("Entfernen", "Remove"),
        "cart_update" => array("Speichern", "Update"),
        "cart_order" => array("Bestellen", "Order"),
        "cart_empty" => array("Bitte etwas in den Warenkorb hinzufügen", "Please add something to your cart"),
        "cart_clear" => array("Leeren", "Clear"),
        "cart_" => array("", ""),

        "conf_title" => array("Bestellung bestätigen", "Confirm order"),
        "conf_orderNow" => array("Jetzt bestellen", "Order now"),
        "conf_payment" => array("Bezahlart", "Payment method"),
        "conf_address" => array("Ihre Adresse", "Your address"),
        "conf_totalPrice" => array("Totaler Preis", "Total price"),
        "conf_cancel" => array("Abbrechen", "Cancel"),
        "conf_finalCancel" => array("Sie gehen einen kostenpflichtigen Vertrag ein. Wirklich jetzt bestellen?", "You are about to enter a binding contract of purchase. Really order now?"),
        "conf_confirmedOrder" => array("Vielen Dank für Ihre Bestellung - sie haben eine Bestellbestätigung per E-Mail erhalten.", "Thanks for your order - you've received an order confirmation via email."),

        "footer_impressum" => array("Impressum", "Impressum"),
        "footer_admin_createFurniture" => array("Möbel erstellen", "Create Furniture"),
        "footer_admin_createCategory" => array("Kategorie erstellen", "Create Category"),
        "login_title"=>array("Login", "Login"),
        "login_name"=>array("Name", "Name"),
        "login_password"=>array("Passwort", "Password"),
        "login_failed"=>array("Benutzername und Password stimmen nich überein", "Username and password do not match"),
        "login_login"=>array("Login", "Login"),
        "login_register"=>array("oder registrieren Sie sich", "or register here"),
        "navi_logout" => array("Abmelden", "Logout"),
        "navi_loggedinAs" => array("Hallo ", "Hello "),
        "navi_register" => array("Registrieren", "Register"),
        "register_title" => array("Registrieren", "Register"),
        "register_firstname" => array("Vorname", "First name"),
        "register_lastname" => array("Nachname", "Last name"),
        "register_address" => array("Adresse", "Address"),
        "register_zip" => array("PLZ", "ZIP"),
        "register_tel" => array("Telefon", "Phone"),
        "register_sex" => array("Geschlecht", "Sex"),
        "register_female" => array("Weiblein", "Female"),
        "register_male" => array("Männlein", "Male"),
        "register_email" => array("Email", "Email"),
        "register_username" => array("Benutzername", "Username"),
        "register_password" => array("Passwort", "Password"),
        "register_passwordVerify" => array("Passwort bestätigen", "Password verify"),
        "register_register" => array("Registrieren", "Register"),
        "register_update" => array("Profil", "Profile"),
        "register_save" => array("Speichern", "Save"),
        "register_errFirstName" => array("Bitte einen Vornamen eingeben", "Please enter a first name"),
        "register_errLastName" => array("Bitte einen Nachnamen eingeben", "Please enter a last name"),
        "register_errAddress" => array("Bitte eine Adresse eingeben", "Please enter an address"),
        "register_errZip" => array("Bitte eine gültige PLZ angeben", "Please enter a valid ZIP code"),
        "register_errTel" => array("Bitte eine gültige Telefonnummer (nur Zahlen) angeben", "Please enter a valid phone number (numbers only)"),
        "register_errEmail" => array("Bitte eine gültige, noch nicht verwendete Email angeben", "Please enter a valid, not already registered email"),
        "register_errUsername" => array("Bitte einen noch nicht verwendeten Benutzernamen angeben (nur Buchstaben, Zahlen, _, -)", "Please enter not already registered username (only letters, numbers, _, -)"),
        "register_errPassword" => array("Passwort muss mindestens 4 Zeichen haben", "Password must be at least 4 characters long"),
        "register_errPasswordVerify" => array("Passwort bitte korrekt wiederholen", "Please repeat the password correctly"),
        "register_success" => array("Gespeichert", "Saved"),

        "furniture_create" => array("Ein neues Möbel erstellen", "Create a new furniture"),

        "register_" => array("", ""),

        "search_noSearchResult" => array("Keine Suchergebnisse...", "Nothing found..."),

        "404_pageNotFound" => array("Die angeforderte Seite wurde nicht gefunden.", "The requested page ist not available.")

    );
}