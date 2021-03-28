<?php
class invoice extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
        $this->shareModel = $this->model('sharePointModel');
        $this->sellerDashboardModel = $this->model('sellerDashboardModel');
    }

    public function index()
    {
        $this->view('invoiceView');
    }
}