<?php
class chat extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
        $this->model=$this->model("chatModel");
    }
    public function index()
    {
        $this->view("chatView");
    }
    
}
?>