<?php
    class addModerator extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            $this->model = $this->model('addModeratorModel');
        }
        public function index()
        {
            $data=array();
            $this->view("addModeratorView",$data);
        }

        public function insert()
        {
            $firstname =  $_POST['firstname'];
            $lastname =  $_POST['lastname'];
            $email =  $_POST['email'];
            $startdate =  $_POST['startDate'];
            $user = $this->model->insertmod($firstname,$lastname,$email,$startdate);
        }
    }
?>