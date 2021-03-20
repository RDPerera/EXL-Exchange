<?php
class sellerAnalytics extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
        $this->sellerDashboardModel = $this->model('sellerDashboardModel');
    }
    public function index()
    {

        $userName = $_SESSION['userName'];
        //retrieving user data from the database
        $user = $this->sellerDashboardModel->retrieveUser($userName);
        if ($user) {

            $data[0] = $user['firstName'];
            $data[1] = $user['lastName'];
            $data[2] = $user['profilePicture'];
        }
        $this->view("s-dashboardANDanalytics", $data);
    }
}
