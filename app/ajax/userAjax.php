<?php
require_once "../../config/app.php";
require_once "../views/inc/session_start.php";
require_once "../../autoload.php";

use app\controllers\userController;

if (isset($_POST['module_user'])) {
    $instanceUser = new userController();
    if($_POST['module_user'] == "register"){
        echo $instanceUser->registerUserController();
    }
} else {
    session_destroy();
    header("Location: " . APP_URL . "login");
}