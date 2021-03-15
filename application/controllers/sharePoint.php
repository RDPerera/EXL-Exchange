<?php
class sharePoint extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
        $this->ads = $this->model('sharePointModel');
    }

    public function index()
    {
        $this->view("sharePointView");
    }
}
?>