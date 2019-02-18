<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 18/02/2019
 * Time: 17:55
 */

class Admin extends Controller
{
    /**
     *loads index view with passed values
     */
    public function index(){
        $reservations = [];
        $this->view('admin/index', $reservations);
    }
}