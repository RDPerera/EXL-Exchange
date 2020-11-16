<?php
class jobRequest extends exlFramework
{
    public function __construct()
    {
        $this->model=$this->model("adChatModel");
        $this->mainModel=$this->model("jobRequestModel");
        $this->secModel=$this->model("jobModel");
        $this->dashmodel=$this->model('buyerDashboardModel');
        $this->helper("linker");
    }
    
    public function get($adId)
    {
        $this->setSession("adId",$adId);
        $this->redirect('jobRequest');
    }
    public function index()
    {
        $data=array();
        $receiver=$this->getSession("adId");
        $sender=$this->getSession("userName");
        if($this->secModel->isJob($receiver,$sender))
        {
            $this->redirect('job');
        }
        else
        {
            $data['adDetails']=$this->model->getCollaborators($receiver);
            $this->setSession('buyer',$sender);
            $this->setSession('receiver',$receiver);
            $this->setSession('sender',$sender);
            $data['userName']=$userName=$this->getSession("userName");
            $data["profilePic"]=$this->dashmodel->checkOlderDP($userName);
            $data['curr-page']="no-page";
            $this->view("jobRequestView",$data);
        }
    }
    
    public function send()
    {  
        
        $adId=$this->getSession('receiver');
        $userName=$this->getSession('sender');
        $this->mainModel->sendRequest($adId,$userName,$this->input("job-date"),$this->input("job-time"),$this->input("additionalPayment"));
        $this->redirect('job');
    }
}
?>