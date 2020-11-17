<?php
    class adminDashboard extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            $this->model = $this->model('completedComplainAdminModel');
            $this->amodel = $this->model('addModeratorModel');
        }

        public function index()
        {
            $data=array();
            $results=$this->model->fetchData();
            $data['results']=$results;
            $this->view("completedComplainAdminView",$data);
        }

        public function approve($compID)
        {
            $modId="1";
            $actionStatus=$_POST['action'];
            $user = $this->model->approve($modId,$actionStatus,$compID);
        }
        public function addModerator()
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
            $user = $this->amodel->insertmod($firstname,$lastname,$email,$startdate);
        }
    }
?>