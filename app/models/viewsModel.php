<?php
namespace app\models;

class viewsModel
{
    protected function getViewModel($view)
    {
        $whiteList = ["dashboard", "new-user"];

        if (in_array($view, $whiteList)) {
            if (is_file("./app/views/content/" . $view . "-view.php")) {
                return "./app/views/content/" . $view . "-view.php";
            } else {
                return "404";
            }
        } elseif ($view == "login" || $view == "index") {
            return "login";
        } else {
            return "404";
        }
    }
}