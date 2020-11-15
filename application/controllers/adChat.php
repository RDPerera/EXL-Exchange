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
        $buyer=$this->getSession('buyer');
        $collaborators=$this->model->getCollaborators($receiver);
        $data['chat']=$this->model->getChat($receiver,$sender,$collaborators['userName'],$collaborators['member1'],$collaborators['member1'],$collaborators['member2'],$collaborators['member3'],$buyer);
        for ($i=0;$i<count($data['chat']);$i++)
        {
            $temp=$this->model->getDetails($data['chat'][$i]['sender']);
            $data['chat'][$i]['fullName']=$temp['firstName']." ".$temp['lastName'];

        }
        $this->view("adChatView",$data);
    }
    public function sellerChat()
    {
        $data['sender']=$sender=$this->getSession('sender');
        $data['receiver']=$receiver=$this->getSession('receiver');
        $buyer=$this->getSession('buyer');
        echo $data['sender'].$data['receiver'].$buyer;
        $data['chat']=$this->model->getSellerChat($receiver,$sender,$buyer);
        $this->view("chatSellerView",$data);
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
        $data['receiver']=$realReceiver=$this->getSession('buyer');
        $data['chatStatus']=$this->model->getStatus($realReceiver);
        $data['userDetails']=$this->model->getDetails($realReceiver);
        $this->view("chatStatusView",$data);
    }
    public function adstatus()
    {
        $data['receiver']=$receiver=$this->getSession('receiver');
        $collaborators=$this->model->getCollaborators($receiver);
        $data['adDetails']=$collaborators;
        $data['chatStatus']=$this->model->getStatus($collaborators['userName']);
        $data['userDetails']=$this->model->getDetails($collaborators['userName']);
        
        $count = 0;
        if ($collaborators['member1']!="")
        {   
            $data['chatStatus1']=$this->model->getStatus($collaborators['member1']);
            $data['userDetails1']=$this->model->getDetails($collaborators['member1']);
            $count++;
        }
        
        if ($collaborators['member2']!="")
        {
            $data['chatStatus2']=$this->model->getStatus($collaborators['member2']);
            $data['userDetails2']=$this->model->getDetails($collaborators['member2']);
            $count++;
        }
        if ($collaborators['member3']!="")
        {
            $data['chatStatus3']=$this->model->getStatus($collaborators['member3']);
            $data['userDetails3']=$this->model->getDetails($collaborators['member3']);
            $count++;
        }
        $data['count']=$count;
        $this->view("adChatStatus",$data);
    }
}
?>