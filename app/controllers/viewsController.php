<?php
namespace app\controllers;
use app\models\viewsModel;

class viewsController extends viewsModel
{
    public function getViewController($view)
    {
        if (is_string($view) && !empty($view)) {
            $response = $this->getViewModel($view);
        } else {
            $response = "login";
        }
        return $response;
    }
}
