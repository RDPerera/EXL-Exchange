<?php
class sellerAnalytics extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
        $this->sellerDashboardModel = $this->model('sellerDashboardModel');
    }
    public function index() //function to load the initial analytics page
    {

        $userName = $_SESSION['userName'];  
        //retrieving user data from the database
        $user = $this->sellerDashboardModel->retrieveUser($userName);

        if ($user) {

            $data[0][0] = $user['firstName'];
            $data[0][1] = $user['lastName'];
            $data[0][2] = $user['profilePicture'];
            $data[0][3] = $user['dob'];
            $data[0][4] = $user['email'];

            //retrieving seller data from the database
            $user = $this->sellerDashboardModel->retrieveSeller($userName);
            $data[0][5] = $user['mainRate'];
            $data[0][6] = $user['communicationRate'];
            $data[0][7] = $user['deliveringRate'];

            //retriving user ad data from the model
            $dataFromAds = $this->sellerDashboardModel->sellerAds($userName);

            //entering the retrieved data to $data 2D array so that we can send it to the view
            $i = 1;
            if ($dataFromAds) {
                $cardCount = count($dataFromAds); //number of ad records we received from the database 
                if ($cardCount > 0) {
                    while ($i <= $cardCount) {
                        $j = 0;
                        while ($j < 8) {
                            $data[$i][$j] =  $dataFromAds[$i - 1][$j]; //putting those ad records to the $data 2D array
                            $j++;
                        }
                        $i++;
                    }
                }
            }
            //load the view
            
            $this->view("s-dashboardANDanalytics", $data);
        } else {
            $this->redirect('login');
        }
    }

    public function loadStatPage($adID){ //to display the advertisement details on top

        $userName = $_SESSION['userName'];  
        //retrieving user data from the database
        $user = $this->sellerDashboardModel->retrieveUser($userName);

        if ($user) {

            $data[0][0] = $user['firstName'];
            $data[0][1] = $user['lastName'];
            $data[0][2] = $user['profilePicture'];
            $data[0][3] = $user['dob'];
            $data[0][4] = $user['email'];

            //retrieving seller data from the database
            $user = $this->sellerDashboardModel->retrieveSeller($userName);
            $data[0][5] = $user['mainRate'];
            $data[0][6] = $user['communicationRate'];
            $data[0][7] = $user['deliveringRate'];

            //retrieving user ad data from the model
            $dataFromAds = $this->sellerDashboardModel->retrieveAd($adID);
           // print_r($dataFromAds);
            $data[0][8] = $dataFromAds;
 
            //load the view
            
            $this->view("s-dashboardAND_AdPerformance", $data);
        } else {
            $this->redirect('login');
        }
    }
}
