<?php
    class complain extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            $this->model = $this->model('complainModel');
        }
        
        public function index()
        {
            $username="dilan";
            $data=array();
            $results=$this->model->selectAdid($username);
            $data['joblist']=$results;
            $this->view("complainView",$data);
        }

        public function insert()
        {
            $complainerUsername =  $_POST['complainerUsername'];
            $accusedUsername =  $_POST['accusedUsername'];
            $jobId=  $_POST['jobId'];
            $description=  $_POST['description'];
            $description=  $_POST['description'];
            $advertisementID=  $_POST['advertisementID'];
            $complainType=  $_POST['complainType'];
            $user = $this->model->insertComplain($complainerUsername,$accusedUsername,$jobId,$description ,$advertisementID,$complainType);
           
        }
 
    }
?>