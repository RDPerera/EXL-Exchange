<?php
    class complainBuyer extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            $this->cmodel = $this->model('complainModel');
            $this->model=$this->model('buyerDashboardModel');
        }
        
        public function index()
        {
            
            //DATA RELEVENT TO BUYER DASHBOARD
            //retrieving user data from the database
            // /$this->getSession("userName")
            $data['complainerUsername']=$data['userName']=$userName='chathura';
            $data["profilePic"]=$this->model->checkOlderDP($userName);

            //END BUYER DASHBOARD

            //load the view
            $this->view("complainViewBuyer",$data);    
        }

        public function insert()
        {
            $userName=$complainerUsername =  $_POST['complainerUsername'];
            $accusedUsername =  $_POST['accusedusername'];
            $jobId=  $_POST['jobid'];
            $description=  $_POST['description'];
            $advertisementID=  $_POST['adid'];
            $complainType=  $_POST['issue'];
            $user = $this->cmodel->insertComplain($complainerUsername,$accusedUsername,$jobId,$description ,$advertisementID,$complainType);


            
            //DATA RELEVENT TO BUYER DASHBOARD
            // /$this->getSession("userName")
            $data['complainerUsername']=$data['userName']=$userName='chathura';
            $data["profilePic"]=$this->model->checkOlderDP($userName);


            //load the view
            $this->view("complainSuccessViewBuyer",$data); 
        }
 
    }
?>