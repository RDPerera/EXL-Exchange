<?php
    class helpCenter extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
        }
        public function index()
        {
            $data=array();
            $this->view("helpCenterView",$data);
        }
        public function seller()
        {
            $data=array();
            $this->view("sellerHelpView",$data);
        }
        public function advertisement()
        {
            $data=array();
            $this->view("advertisementHelp",$data);
        }
      
    }
?>