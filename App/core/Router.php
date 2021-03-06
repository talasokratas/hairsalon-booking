<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 18/02/2019
 * Time: 16:35
 */

class Router
{
    protected $currentController = 'Home';
    protected $currentMethod = 'index';
    protected $params = [];

    /**
     * Router constructor.
     *
     *Calls for a passed controller method or
     * default controller
     */
    public function __construct(){

        $url = $this->getURL();

        if(file_exists('../App/controllers/' .ucwords($url[0]) .'.php')){
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        require_once '../App/controllers/' . $this->currentController . '.php';

        $this->currentController = new $this->currentController;

        if(isset($url[1])){
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    /**
     *
     * Splits url into variables that will be passed as controller class, method and params
     * @return array|mixed|string
     */
    public function getURL(){
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}