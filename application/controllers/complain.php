<?php
    class complain extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            $this->model = $this->model('complainModel');
            $this->sellerDashboardModel = $this->model('sellerDashboardModel');
        }
        
        public function index()
        {
            $data['complainerUsername']=$userName=$_SESSION['userName']='dilan';
            //DATA RELEVENT TO SELLER DASHBOARD
            
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

                //END SELLER DASHBOARD

                //load the view
                $this->view("complainView",$data);
            } else {
                $this->redirect('login');
            }
            
        }

        public function insert()
        {
            $userName=$complainerUsername =  $_POST['complainerUsername'];
            $accusedUsername =  $_POST['accusedusername'];
            $jobId=  $_POST['jobid'];
            $description=  $_POST['description'];
            $advertisementID=  $_POST['adid'];
            $complainType=  $_POST['issue'];
            $user = $this->model->insertComplain($complainerUsername,$accusedUsername,$jobId,$description ,$advertisementID,$complainType);

            
            //DATA RELEVENT TO SELLER DASHBOARD
            
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

                //END SELLER DASHBOARD

                //load the view
                $this->view("complainSuccessView",$data);
            } else {
                $this->redirect('login');
            }
        }
 
    }
?>