<?php

class jobResponce extends exlFramework
{

    public function __construct()
    {
        $this->model=$this->model("jobResponceModel");
        $this->helper("linker");
    }

    public function index()
    {
        $receiver="1";
        $sender="dilan";
        $data['buyer']=$buyer="chathura";
        $data['job']=$this->model->getJob($receiver,$buyer);
        $data['adDetails']=$this->model->getAdDetails($receiver);
        $this->setSession('buyer',$buyer);
        $this->setSession('receiver',$receiver);
        $this->setSession('sender',$sender);
        $this->view("jobResponceView",$data);
        
        
    }

    public function accept($jobId)
    {  
        $userName=$this->getSession('buyer');
        $this->model->accept($userName,$jobId);
        $this->redirect('jobResponce');
    }
    public function reject($jobId)
    {  
        $userName=$this->getSession('buyer');
        $this->model->reject($userName,$jobId);
        $this->redirect('jobResponce');
    }

}

?>