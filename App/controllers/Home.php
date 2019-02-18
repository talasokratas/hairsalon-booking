<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 18/02/2019
 * Time: 17:05
 */

class Home extends Controller
{

    /**
     *loads default view
     */
    public function index() {
        $this->view('index');
    }

}