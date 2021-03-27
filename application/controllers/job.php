<?php
class job extends exlFramework
{
    public function __construct()
    {
        $this->model=$this->model("adChatModel");
        $this->mainModel=$this->model("jobModel");
        $this->dashmodel=$this->model('buyerDashboardModel');
        $this->loginModel = $this->model('loginModel');
        $this->helper("log");
        $this->helper("mail");
        $this->helper("linker");
    }
    public function get($adId)
    {
        $this->setSession("adId",$adId);
    }
    public function index()
    {
        $data=array();
        $receiver=$this->getSession("adId");
        $sender=$this->getSession("userName");
        if($this->mainModel->isJob($receiver,$sender))
        {
            $data['job']=$this->mainModel->getJob($receiver,$sender);
            $data['adDetails']=$this->model->getCollaborators($receiver);
            $this->setSession('buyer',$sender);
            $this->setSession('receiver',$receiver);
            $this->setSession('sender',$sender);
            $this->setSession('jobId',$data['job'][0]['jobId']);
            $data['userName']=$userName=$this->getSession("userName");
            $data["profilePic"]=$this->dashmodel->checkOlderDP($userName);
            $data['curr-page']="no-page";
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
        $collab=$this->model->getCollaborators($adId);
        $this->notify($collab['userName'],$adId,$userName);
        if ($collab['member1']!='')
        {
            $this->notify($collab['member1'],$adId,$userName);
        }
        if ($collab['member2']!='')
        {
            $this->notify($collab['member2'],$adId,$userName);
        }
        if ($collab['member3']!='')
        {
            $this->notify($collab['member3'],$adId,$userName);
        }
        $this->redirect('job');
    }
    private function notify($userName,$adId,$buyer)
    {
        $user = $this->loginModel->userNameCheck($userName);
        if ($user) { 
            $email=$user['email'];
            $userName=$user['userName'];
            $fisrtName=$user['firstName'];
            //login link
            $link=BASEURL."/login";

            // Set email format to HTML
            $Subject = 'New Job Request';
            
            $Body= "<b> <p style='font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif;font-size:15px;'>$fisrtName ,</b><br>
            You have new JOB Request from <b> $buyer </b> to your advertisement ID $adId.
            <br><br>
            You can login to your account by clicking 
            <a href='$link'> here. </a><br><br>
            <br>
            The EXL-Exchange";

            $AltBody = "You have new JOB Request";
            sendMail($email,$fisrtName." ".$lastName,$Subject,$Body,$AltBody);
        }
    }
}
?>