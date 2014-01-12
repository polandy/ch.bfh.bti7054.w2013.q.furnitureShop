<?php
global $tpl;

$msgService = \service\MsgService::getInstance();
$userService = \service\UserService::getInstance();
$config = Config::getInstance();

$loggedinUser = $config->getUser();
$user = null;
if ($loggedinUser)
    $user = clone $loggedinUser;
else
    $user = new \model\User();

$updateProfile = $loggedinUser != null;
$tpl->assign("updateProfile", $updateProfile);
$tpl->assign("actionName", $updateProfile ? $msgService->getName("register_update") : $msgService->getName("register_register"));

if (isset($_POST["firstName"])) {
    $user->firstName = $_POST["firstName"];
    $user->lastName = $_POST["lastName"];
    $user->address = $_POST["address"];
    $user->zip = $_POST["zip"];
    $user->tel = $_POST["tel"];
    $user->male = $_POST["male"];
    $user->password = $_POST["password"];

    if (!$updateProfile) {
        $user->email = $_POST["email"];
        $user->username = $_POST["username"];
    }

    // Is there an error?
    $error = false;

    if (!preg_match("/^\\w{3,}$/", $user->firstName)) {
        $tpl->assign("errFirstName", $msgService->getErrorMsg($msgService->getName("register_errFirstName")));
        $error = true;
    }
    if (!preg_match("/^\\w{3,}$/", $user->lastName)) {
        $tpl->assign("errLastName", $msgService->getErrorMsg($msgService->getName("register_errLstName")));
        $error = true;
    }
    if (!preg_match("/^.{3,}$/", $user->address)) {
        $tpl->assign("errAddress", $msgService->getErrorMsg($msgService->getName("register_errAddress")));
        $error = true;
    }
    if (!preg_match("/^[1-9][0-9]{3}$/", $user->zip)) {
        $tpl->assign("errZip", $msgService->getErrorMsg($msgService->getName("register_errZip")));
        $error = true;
    }
    if (!preg_match("/^[0-9]{10,}$/", $user->tel)) {
        $tpl->assign("errTel", $msgService->getErrorMsg($msgService->getName("register_errTel")));
        $error = true;
    }

    // Change user name only on register
    if (!$updateProfile) {
        if (!preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/", $user->email) || $userService->findUserByEmail($user->email) != null) {
            $tpl->assign("errEmail", $msgService->getErrorMsg($msgService->getName("register_errEmail")));
            $error = true;
        }
        if (!preg_match("/^[a-zA-Z][a-zA-Z0-9-_]{2,}$/", $user->username) || $userService->findUserByName($user->username) != null) {
            $tpl->assign("errUsername", $msgService->getErrorMsg($msgService->getName("register_errUsername")));
            $error = true;
        }
    }

    // Now PW change on save
    if (!$updateProfile || $user->password != "") {
        if (!preg_match("/^.{4,}$/", $user->password)) {
            $tpl->assign("errPassword", $msgService->getErrorMsg($msgService->getName("register_errPassword")));
            $error = true;
        }
        if ($user->password != $_POST["passwordVerify"]) {
            $tpl->assign("errPasswordVerify", $msgService->getErrorMsg($msgService->getName("register_errPasswordVerify")));
            $error = true;
        }
        $user->password = sha1($user->password);
    } // No password change
    else {
        $user->password = $loggedinUser->password;
    }

    // Load place name by zip
    $geoReq = file_get_contents("http://api.geonames.org/postalCodeLookupJSON?postalcode=" . $_POST["zip"] . "&country=CH&username=gigu88");
    $geoReq = json_decode($geoReq);
    $zips = $geoReq->{"postalcodes"};
    if (sizeof($zips) >= 1) {
        $user->place = $zips[0]->{"adminName3"};
    } else {
        $tpl->assign("errZip", $msgService->getErrorMsg($msgService->getName("register_errZip")));
        $error = true;
    }

    if (!$error) {
        $userService->updateUser($user);
        // Go to home page on successful register
        if(!$updateProfile){
            $loggedinUser = $userService->findUserByName($user->username);
            $_SESSION["user_id"] = $loggedinUser->id;
            header("Location: ./index.php");
        }
        $tpl->assign("success", $msgService->getSuccessMsg("register_success"));
    }
}


//$user = $userService->findUserByName($_POST["name"]);

//// User tries to login
//if (isset($_POST["name"])) {
//    if (isset($user) && $user->password == sha1($_POST["password"])) {
//        $_SESSION["user_id"] = $user->id;
//        header("Location: ./index.php");
//    } else {
//        $tpl->assign("errorMsg", $msgService->getErrorMsg($msgService->getName("login_failed")));
//        $_SESSION["user_id"] = null;
//    }
//}


$tpl->assign("firstName", $user->firstName);
$tpl->assign("lastName", $user->lastName);
$tpl->assign("address", $user->address);
$tpl->assign("zip", $user->zip);
$tpl->assign("tel", $user->tel);
$tpl->assign("male", $user->male);
$tpl->assign("email", $user->email);
$tpl->assign("username", $user->username);
