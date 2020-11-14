<?php
class job extends exlFramework
{
    public function __construct()
    {
        $this->model=$this->model("adChatModel");
        $this->helper("linker");
    }
    public function index()
    {
        $data=array();
        $receiver="1";
        $sender="nimaya";
        $data['adDetails']=$this->model->getCollaborators($receiver);
        $this->setSession('buyer',$sender);
        $this->setSession('receiver',$receiver);
        $this->setSession('sender',$sender);
        $this->view("jobView",$data);

    }
}
?>