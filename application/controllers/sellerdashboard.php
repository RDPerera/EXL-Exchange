<?php
class sellerDashboard extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
        $this->sellerDashboardModel = $this->model('sellerDashboardModel');
    }
    public function index()
    {
        // session_start();
        // $userName = $_SESSION['userName'];
        $userName = "chathura"; //hard coded

        //retrieving user data from the database
        $user = $this->sellerDashboardModel->retrieveUser($userName);

        if ($user) {
            $data[0] = $user['firstName'];
            $data[1] = $user['lastName'];
            $data[2] = $user['profilePicture']; //INCOMPLETE
            $data[3] = $user['dob'];
            $data[4] = $user['email'];
 
            //retrieving user data from the database
            $user = $this->sellerDashboardModel->retrieveSeller($userName);

            $data[5] = $user['mainRate'];
            $data[6] = $user['communicationRate'];
            $data[7] = $user['deliveringRate'];
            
        } else {
            header('Location: ../login/login.php');
        }
        if (isset($_POST['logout'])) {
            session_destroy();
            header('Location: ../login/login.php');
        }
        //load the view
        $this->view("sellerDashboardView",$data);
    }
}
