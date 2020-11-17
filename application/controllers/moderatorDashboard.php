<?php
    class moderatorDashboard extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            $this->model = $this->model('completedComplainAdminModel');
            $this->amodel = $this->model('addModeratorModel');
            $this->main_model = $this->model('adminDashboardModel');
        }

        public function index()
        {
            $data=array();
            $admin=$this->getSession("userName");
            if(!($this->main_model->moderatorCheck($admin)))
            {$this->redirect("login");}
            $results=$this->model->getData();
            $data['results']=$results;
            $this->view("completedComplainModView",$data);
        }
        public function logout()
        {
            session_destroy();
            $this->redirect('login');
        }
        public function current()
        {
            $data=array();
            $results=$this->model->getDataCur();
            $data['results']=$results;
            $this->view("completedCurrComplainMod",$data);
        }
        public function approve()
        {
            $modId=$this->getSession("userName");
            $actionStatus=$_POST['action'];
            $user = $this->model->apply($modId,$actionStatus,$_POST['compId']);
            $this->redirect('moderatorDashboard');
        }
        public function addModerator()
        {
            $data=array();
            $this->view("addModeratorView",$data);
        }

        public function insert()
        {
            $username =  $_POST['username'];
            $firstname = $_POST['firstname'];
            $lastname =  $_POST['lastname'];
            $email =  $_POST['email'];
            date_default_timezone_set('Asia/Colombo');
            $startdate = date('Y-m-d H:i:s');
            $dob =  $_POST['startDate'];
            $passwd=$_POST['password'];
            $user = $this->amodel->insertmod($username,$startdate);
            $user = $this->amodel->insertUser($username,$firstname,$lastname,$dob,$email,$passwd);
            $this->redirect("adminDashboard");
        }
    }
?>