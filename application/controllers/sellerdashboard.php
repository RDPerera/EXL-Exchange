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

            $data[0][0] = $user['firstName'];
            $data[0][1] = $user['lastName'];
            // $data[0][2] = $user['profilePicture']; //INCOMPLETE
            $data[0][3] = $user['dob'];
            $data[0][4] = $user['email'];

            //retrieving user data from the database
            $user = $this->sellerDashboardModel->retrieveSeller($userName);
            $data[0][5] = $user['mainRate'];
            $data[0][6] = $user['communicationRate'];
            $data[0][7] = $user['deliveringRate'];

            //retriving user ad data from the model
            $dataFromAds = $this->sellerDashboardModel->sellerAds($userName);

            $i = 1;
            $j = 0;
            if($dataFromAds){
                $cardCount = count($dataFromAds);
                if ($cardCount > 0) 
                {
                    while ($cardCount--) {
                        while ($j < 8) {
                            $data[$i][$j] =  $dataFromAds[$i - 1][$j];
                            $j++;
                        }
                        $i++;
                    }
                }
            }

            //load the view
            $this->view("sellerDashboardView", $data);
        } else {
            header('Location: ../login/login.php');
        }
        if (isset($_POST['logout'])) {
            session_destroy();
            header('Location: ../login/login.php');
        }
    }
}
