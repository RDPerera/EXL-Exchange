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
    public function submit()
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
}
?>