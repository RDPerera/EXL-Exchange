<?php
class adChat extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
        $this->model=$this->model("adChatModel");
    }

    public function index()
    {
        $data['sender']=$sender=$this->getSession('sender');
        $data['receiver']=$receiver=$this->getSession('receiver');
        $data['chat']=$this->model->getChat($sender,$receiver);
        $this->view("chatView",$data);
    }
    public function send()
    {
        $data['sender']=$sender=$this->getSession('sender');
        $data['receiver']=$receiver=$this->getSession('receiver');
        $message=$_POST['message'];
        date_default_timezone_set('Asia/Colombo');
        $date=date("Y-m-d");
        $time=date("h:i:sa");
        echo $time;
        $this->model->send($message,$sender,$receiver,$date,$time);
    }
    public function status()
    {
        $data['receiver']=$receiver=$this->getSession('receiver');
        $data['chatStatus']=$this->model->getStatus($receiver);
        $data['userDetails']=$this->model->getDetails($receiver);
        $this->view("chatStatusView",$data);
    }
    public function adstatus()
    {
        $data['receiver']=$receiver=$this->getSession('receiver');
        $data['chatStatus']=$this->model->getStatus($receiver);
        $data['userDetails']=$this->model->getDetails($receiver);
        $this->view("chatStatusView",$data);
    }
}
?>