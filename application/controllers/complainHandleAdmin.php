<?php
    class complainHandleAdmin extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            $this->model = $this->model('complainHandleAdminModel');
        }

        public function index()
        {
            $data=array();
            $results=$this->model->fetchData();
            $data['results']=$results;
            $this->view("complainHandleAdminView",$data);
        }

        public function approve($compID)
        {
            $adminId="1";
            $actionStatus=$_POST['action'];
            $user = $this->model->approve($adminId,$actionStatus,$compID);
        }
    }   
?>