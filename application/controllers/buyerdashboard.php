<?php
class buyerDashboard extends exlFramework
{
    public function __construct()
        {
            $this->helper("linker");
        }
        public function index()
        {
            /*Initially No errors*/
            $this->view("buyerDashboardView");
           
        }
}
?>