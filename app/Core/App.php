<?php

class App
{
    protected $controller = "HomeController";
    protected $action = "index";
    protected $params = [];
    
    public function __construct()
    {

        $this->prepareURL();
        $this->render();

        //    var_dump($this->render());

    }
    private function prepareURL()
    {
        $url = $_SERVER['REQUEST_URI'];

        if (!empty($url)) {
            $url = trim($url, '/');
            $url = explode("/", $url);
            // define the controller 

            $this->controller = !empty($url[0]) ? ucwords($url[0]) . "Controller" : "HomeController";
            $this->action = !empty($url[1]) ? $url[1] : "index";

            unset($url[0], $url[1]);

            $this->params = !empty($url) ? array_values($url) : [];
        }
    }


    private function render()
    {
        if (class_exists($this->controller)) {
            $controller = new $this->controller;
            if (method_exists($controller, $this->action)) {
                call_user_func_array([$controller, $this->action], $this->params);
            }else{
                echo 'Error 404';
            }
        } else {
            echo " This Controller : " . ($this->controller) . " Not Exist ";
        }
    }
}
