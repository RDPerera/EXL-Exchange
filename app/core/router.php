<?php

class router {
    
    // Default controller, method, parameters -- SET THESE VALUES!!

    public $controller = ""; 
    public $method     = "";
    public $params     = [];

    public function __construct()
    {
        $url = $this->url();
        if(!empty($url)){
            if(file_exists("../../src/controllers/" . $url[0] . ".php")){
                    $this->controller = $url[0];
                    unset($url[0]);
            } else {
                echo "$url[0].php not found";
            }
        }
        
        // Include controller
        require_once "../../src/controllers/" . $this->controller . ".php";
        // create an instrance of the controller
        $this->controller = new $this->controller;


        if(isset($url[1]) && !empty($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);

            } else {
                echo " method ".$url[1]." not found";
            }
        }

        if(isset($url)){
            $this->params = $url;
        } else {
            $this->params = [];
        }

        //call the method of the controller class by passing parameters array
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function url(){
        if(isset($_GET['url'])){
            $url = $_GET['url'];
            $url = rtrim($url);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }

}

?>