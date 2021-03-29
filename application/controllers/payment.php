<?php
class payment extends exlFramework
{
    public function __construct()
    {
        $this->model=$this->model("paymentModel");
        $this->helper("linker");
    }
    
    public function index()
    {
        $data=array();
        $buyer=$data['buyer']=$this->getSession("userName");
        $seller=$data['seller']=$this->getSession("seller");
        $adId=$data['adId']=$this->getSession("adId");
        $jobId=$data['jobId']=$this->getSession("jobId");
        $adData=$data['adData']=$this->getSession("adData");
        $jobData=$data['jobData']=$this->getSession("jobData");
        $adPay=$data['adPay']=$this->getSession("adPay");
        $adPrice=$data['adPrice']=$this->getSession("adPrice");
        $this->model->pay($buyer,$seller,date("Y-m-d"),date("H:i:s"),$jobId,$adId,$adPrice+$adPay,($adPrice+$adPay)*0.1,($adPrice+$adPay)*0.9);
        $this->view("paymentView",$data);
        
    }
}
?>