<?php
class job extends exlFramework
{
    public function __construct()
    {
        $this->model=$this->model("adChatModel");
        $this->mainModel=$this->model("jobModel");
        $this->helper("linker");
    }
    public function index()
    {
        $data=array();
        $receiver="1";
        $sender="chathura";
        if($this->mainModel->isJob($receiver,$sender))
        {
            $data['job']=$this->mainModel->getJob($receiver,$sender);
            $data['adDetails']=$this->model->getCollaborators($receiver);
            $this->setSession('buyer',$sender);
            $this->setSession('receiver',$receiver);
            $this->setSession('sender',$sender);
            $this->view("jobView",$data);
            
        }
        else{
            $this->redirect('jobRequest');
        }
    }
    public function resend($jobId)
    {  
        $adId=$this->getSession('receiver');
        $userName=$this->getSession('sender');
        $this->mainModel->resendRequest($adId,$userName,$this->input("date"),$this->input("time"),$this->input("additionalPrice"),$jobId);
        $this->redirect('job');
    }
}
?>