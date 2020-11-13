<?php
class jobResponce extends exlFramework
{
    public function __construct()
    {
        $this->model=$this->model("adChatModel");
        $this->helper("linker");
    }

    public function index()
    {
        $receiver="1";
        $sender="dilan";
        $buyer="nimaya";
        $data['adDetails']=$this->model->getCollaborators($receiver);
        $this->setSession('receiver',$receiver);
        $this->setSession('sender',$sender);
        $this->setSession('buyer',$buyer);
        $this->view("jobResponceView",$data);
    }
}
?>