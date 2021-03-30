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
        public function payment()
        {
            $data = array();
            $admin = $this->getSession("userName");
            if (!($this->main_model->moderatorCheck($admin))) {
                $this->redirect("login");
            }
            $results = $this->model->payments();
            $data['results'] = $results;
            $this->view("PaymentModView", $data);
        }

        public function loadReportView()
        {
            //retrieve data needed for the top part
            //retrieve this month revenue data to generate the description
            $thisMonthRevenue = $this->main_model->retrieveRevenueThisMonth();

            //get the average revenue per month to generate the description
            $avgRevenue = $this->main_model->retrieveRevenueAverage();

            //to send those data to the view
            $data['thisMonthTotal'] = $thisMonthRevenue['thisMonthTotal'];
            $data['avgRevenue'] = $avgRevenue['avgRevenue'];


            //retrieve data needed for the bottom part
            $bottomData = $this->main_model-> totalAverageVisitors();

            //to send those data to the view
            $data['totalVisitors'] = $bottomData['totalVisitors'];
            $data['avgVisitors'] = $bottomData['avgVisitors'];

            
            $this->view("adminReportMod", $data);
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
    }
?>