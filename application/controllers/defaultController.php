<?php

class defaultController extends exlFramework
{
    public function __construct()
    {
        $this->ads = $this->model('homeModel');
    }
    public function index(){
        $this->helper("linker");
        $this->view("homeView",$this->ads->getAds());

    }
}

?>