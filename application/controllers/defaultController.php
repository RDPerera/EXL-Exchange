<?php

class defaultController extends exlFramework
{
    public function _constructor()
    {
        $this->helper("link");
    }
    public function index(){
        $this->view("home");
        
    }
}

?>