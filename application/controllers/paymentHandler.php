<?php
class paymentHandler extends exlFramework
{
    public function __construct()
    {
        $this->model=$this->model("paymentModel");
        $this->helper("linker");
    }
    
    public function index()
    {
        $data=array();
        // $receiver=$this->getSession("adId");
        $this->view("paymentHandlerView",$data);
        
    }
}
?>