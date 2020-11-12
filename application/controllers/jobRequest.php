<?php
class jobRequest extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
    }

    public function index()
    {
        $receiver="1";
        $sender="nimaya";
        $this->setSession('buyer',$sender);
        $this->setSession('receiver',$receiver);
        $this->setSession('sender',$sender);
        $this->view("jobRequestView");
    }
}
?>