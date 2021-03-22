<?php
class messenger extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
    }

    public function index($user)
    {
        $data['user']=$user;
        $this->view("messengerView");
    }
}
?>