<?php
class jobResponce extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
    }

    public function index()
    {
        $receiver="dilan";
        $sender="1";
        $this->setSession('receiver',$receiver);
        $this->setSession('sender',$sender);
        $this->view("jobResponceView");
    }
}
?>