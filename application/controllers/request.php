<?php
class request extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
    }

    public function index()
    {
        $this->view("requestView");
    }
}
?>