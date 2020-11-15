<?php

class jobResponce extends exlFramework
{

    public function __construct()
    {
        $this->model=$this->model("jobResponceModel");
        $this->helper("linker");
    }
    public function get($jobId)
    {
        $this->setSession('jobId',$jobId);
        $this->redirect('jobResponce');
    }
    public function index()
    {
        $jobId=$this->getSession("jobId");
        $data['job']=$this->model->getJob($jobId);
        $receiver=$data['job']['adId'];
        $sender=$this->getSession("userName");
        $data['buyer']=$buyer=$data['job']['userName'];
        
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