<?php
class adminDashboard extends exlFramework
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
        $data = array();
        $admin = $this->getSession("userName");
        if (!($this->main_model->adminCheck($admin))) {
            $this->redirect("login");
        }
        $results = $this->model->fetchData();
        $data['results'] = $results;
        $this->view("completedComplainAdminView", $data);
    }
    public function payment()
    {
        $data = array();
        $admin = $this->getSession("userName");
        if (!($this->main_model->adminCheck($admin))) {
            $this->redirect("login");
        }
        $results = $this->model->payments();
        $data['results'] = $results;
        $this->view("PaymentAdminView", $data);
    }
    public function logout()
    {
        session_destroy();
        $this->redirect('login');
    }
    public function current()
    {
        $data = array();
        $results = $this->model->fetchDataCur();
        $data['results'] = $results;
        $this->view("completedComplainAdminCurrView", $data);
    }
    public function approve()
    {
        $modId = $this->getSession("userName");
        $actionStatus = $_POST['action'];
        $user = $this->model->approve($modId, $actionStatus, $_POST['compId']);
        $this->redirect('adminDashboard');
    }
    public function addModerator()
    {
        $data = array();
        $this->view("addModeratorView", $data);
    }
    //insert admin
    public function insert()
    {
        $username =  $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname =  $_POST['lastname'];
        $email =  $_POST['email'];
        date_default_timezone_set('Asia/Colombo');
        $startdate = date('Y-m-d H:i:s');
        $dob =  $_POST['startDate'];
        $passwd = $_POST['password'];
        $user = $this->amodel->insertmod($username, $startdate);
        $user = $this->amodel->insertUser($username, $firstname, $lastname, $dob, $email, $passwd);
        $this->redirect("deleteModerator");
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

        
        $this->view("adminReport", $data);
    }


    //retrieve revenue data for plotting
    public function getRevenueData()
    {
        $revenueData = $this->main_model->retrieveRevenueData();
        print json_encode($revenueData);
    }

    //retrieve visitor data for plotting
    public function getVisitorByCountry()
    {

        /*TO GET THE COUNTRY DATA OF EACH IP*/

        //get the visitor by country
        $visitorData = $this->main_model->retrieveVisitorByCountry();

        //create a new array $data, which has each country and its corresponding visitor count
        foreach ($visitorData as $row) {
            $data[] = array("country" => ($this->ip_info($row['ip'], "Country")), "visitors" => $row['visitors']);
        }

        print json_encode($data);
    }

    //retrieve visitor data for plotting
    public function getVistorByDate()
    {
        $visitorData = $this->main_model->retrieveVisitorByDate();
        print json_encode($visitorData);
    }
}
