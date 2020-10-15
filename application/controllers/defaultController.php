<?php

class defaultController extends exlFramework
{
    public function index(){
        $this->helper("linker");
        $this->view("home");
        
    }
}

?>