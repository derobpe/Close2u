<?php
namespace app\controllers;
use app\models\mainModel;

class userController extends mainModel
{

    /**
     * Register user Controller
     */
    public function registerUserController()
    {

        # Getting data
        $name = $this->clearString($_POST['user_name']);
        $surname = $this->clearString($_POST['user_surname']);
        $username = $this->clearString($_POST['user_username']);
        $email = $this->clearString($_POST['user_email']);
        $pass1 = $this->clearString($_POST['user_password_1']);
        $pass2 = $this->clearString($_POST['user_password_2']);

        # Verify required fields
        if ($name == "" || $surname == "" || $username == "" || $pass1 == "" || $pass2 == "") {
            $alert = [
                "type" => "simple",
                "icon" => "error",
                "title" => "An unexpected error occurred",
                "text" => "You have not filled in all the required fields",
            ];
            return json_encode($alert);
        }
        $alert = [
            "type" => "simple",
            "icon" => "success",
            "title" => "Registration Successful",
            "text" => "The user has been registered.",
        ];
        return json_encode($alert);
    }
}