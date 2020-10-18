<?php

class home extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
        $this->ads = $this->model('homeModel');
    }
    public function index(){
        /*Get DATA for Ad Categories */
        $data['popular']=$this->ads->getAdsPopular();
        $data['new']=$this->ads->getAdsNew();
        $data['noob']=$this->ads->getAdsNoob();
        /*Render View */
        $this->view("homeView",$data);

    }
}

?>