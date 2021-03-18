<?php
    class completedComplainAdmin extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            $this->model = $this->model('completedComplainAdminModel');
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
    }
?>