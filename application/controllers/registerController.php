<?php
    class registerController extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            // $this->registerModel = $this->model('registerSellerModel');
        }
        public function index()
        {
            $this->view("register");
        }
}
?>
