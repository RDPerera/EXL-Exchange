<?php

class defaultController extends exlFramework
{
    public function __construct()
    {
        $this->ads = $this->model('homeModel');
    }
    public function index(){
        $this->helper("linker");
        $data['popular']=$this->ads->getAdsPopular();
        $data['new']=$this->ads->getAdsNew();
        $data['noob']=$this->ads->getAdsNoob();
        $this->view("homeView",$data);

    }
}

?>