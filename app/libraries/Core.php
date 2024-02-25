<?php
    /* 
        App Core class
        creates url and loads core controllers
        URL format - /controller/method/params
    */

    class Core {
        protected $currentController = "PageController";
        protected $currentMethod = "index";
        protected $params = [];

        public function __construct(){
            // print_r($this->getUrl());
            $url = $this->getUrl();
            // Look in controllers for first index/value
            if($url && file_exists('../app/controllers/'. ucwords($url[0]) . 'Controller.php')){
                // if exists set as currnet controller
                $this->currentController = ucwords($url[0])."Controller";
                // unset 0 index
                unset($url[0]);
            }

            // Require the controller

            require_once "../app/controllers/". $this->currentController . ".php";

            // instantiate controller class
            $this->currentController = new $this->currentController;

            // check for second part of url
            if(isset($url[1])){
                // check to see if method exists
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    // unset 1 index
                    unset($url[1]);
                }
            }

            // get params
            $this->params = $url ? array_values($url) : [];

            // Call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod],$this->params);
        }
    
        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'],'/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode("/",$url);
                return $url;
            }
        }
    }
?>