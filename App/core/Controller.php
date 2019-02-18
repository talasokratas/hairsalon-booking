<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 18/02/2019
 * Time: 16:35
 */

class Controller
{
    /**
     * @param $model
     * @return mixed
     */
    public function model($model) {
        require_once '../App/models/' . $model . '.php';
        return new $model();
    }

    /**
     * @param $view
     * @param array $data
     */
    public function view($view, $data = []) {
        if(file_exists('../App/views/' . $view . '.php')) {
            require_once '../App/views/' . $view . '.php';
        } else {
            die('view does not exist');
        }
    }
}