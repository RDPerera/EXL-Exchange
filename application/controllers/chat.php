<?php
class chat extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
        $this->model=$this->model("chatModel");
    }

    public function index()
    {
        $data['sender']=$sender="Dilan";
        $data['receiver']=$receiver="Nimaya";
        $data['chat']=$this->model->getChat($sender,$receiver);
        $this->view("chatView",$data);
    }
    public function send()
    {
        $sender="Dilan";
        $receiver="Nimaya";
        $message=$_POST['message'];
        date_default_timezone_set('Asia/Colombo');
        $date=date("Y-m-d");
        $time=date("h:i:sa");
        echo $time;
        $this->model->send($message,$sender,$receiver,$date,$time);
    }
    public function status()
    {
        $data['sender']=$sender="Dilan";
        $data['receiver']=$receiver="dilan";
        $data['chatStatus']=$this->model->getStatus($receiver);
        $data['userDetails']=$this->model->getDetails($receiver);
        $this->view("chatStatusView",$data);
    }
}
?>