<?php
class sellerJobHandler extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
        $this->sellerDashboardModel = $this->model('sellerDashboardModel');
        $this->model=$this->model("jobResponceModel");
        $this->loginModel = $this->model('loginModel');
        $this->helper("log");
        $this->helper("mail");
    }
    public function get($jobId)
    {
        $this->setSession('jobId',$jobId);
        $this->redirect('sellerJobHandler');
    }
    public function index()
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

            //retrieving user data from the database
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
            
            //fetching job requests
            $data['memory']=$data;
            $data['jobs']=$this->sellerDashboardModel->getjobs($userName);
            //print_r($this->sellerDashboardModel->getjobs($userName));
            //load the view
            $jobId=$this->getSession("jobId");
            $data['job']=$this->model->getJob($jobId);
            $receiver=$data['job']['adId'];
            $sender=$this->getSession("userName");
            $data['buyer']=$buyer=$data['job']['userName'];
            
            $data['adDetails']=$this->model->getAdDetails($receiver);
            $this->setSession('buyer',$buyer);
            $this->setSession('receiver',$receiver);
            $this->setSession('sender',$sender);
            $this->view("sellerJobHandlerView", $data);
        } else {
            $this->redirect('login');
        }
    }
    public function logout()
    {
        $this->sellerDashboardModel->setOffline($userName);
        session_destroy();
        $this->redirect('login');
    }
    //accept buyer job request
    public function accept($jobId)
    {  
        $userName=$this->getSession('buyer');
        $this->model->accept($userName,$jobId);
        $this->notify($userName,$jobId,"Accepted");
        $this->redirect('sellerJobHandler');
    }
    //reject job request
    public function reject($jobId)
    {  
        $userName=$this->getSession('buyer');
        $this->model->reject($userName,$jobId);
        $this->notify($userName,$jobId,"Rejected");
        $this->redirect('sellerJobHandler');
    }

    public function loadChangeDPView()
    {
        $this->view("changeProfilePicture"); //load the view to change the profile picture
    }
    private function notify($userName,$jobId,$state)
    {
        $user = $this->loginModel->userNameCheck($userName);
        if ($user) { 
            $email=$user['email'];
            $userName=$user['userName'];
            $fisrtName=$user['firstName'];
            //login link
            $link=BASEURL."/login";

            // Set email format to HTML
            $Subject = "Job Request $state";
            $state=strtolower($state);
            $Body= "<b> <p style='font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif;font-size:15px;'>$fisrtName ,</b><br>
            Your JOB Request to Job Id : <b>$jobId</b> was <b>$state</b> by the seller.
            <br><br>
            You can login to your account by clicking 
            <a href='$link'> here. </a><br><br>
            <br>
            The EXL-Exchange";

            $AltBody = "Job Request $state ; $jobId";
            sendMail($email,$fisrtName." ".$lastName,$Subject,$Body,$AltBody);
        }
    }
    public function handleThePicture()
    {
        $userName = $_SESSION['userName'];  
        $row = $this->sellerDashboardModel->checkOlderDP($userName);

        //check whether there is an older profile picture
        if ($row['profilePicture']) {
            //delete the older profile picture from the system folder
            unlink("../public/assets/img/userImages/" . $row['profilePicture'] . "");
        }

        if (isset($_POST['saveButton'])) {

            //retrieving user entered data from the form
            if (!empty($_FILES["imageUpload"]["name"])) //the user have uploaded a new image
            {
                //Process the new image that is uploaded by the user
                $target_dir = "../public/assets/img/userImages/";
                $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $filename = $_FILES["imageUpload"]["name"];

                move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file);

                $timestamp = time();
                $image = $userName . $timestamp . "." . $imageFileType; //generating an unique name to the image file
                rename("../public/assets/img/userImages/$filename", "../public/assets/img/userImages/$image"); //adding the generated name to the file

                //Update the database with the new picture and delete the older profile picture from database
                $this->sellerDashboardModel->updateNewDP($image, $userName);
            } else {
                //set the default one as the DP
                $this->sellerDashboardModel->deleteDP($userName);
            }
        }
        $this->redirect('sellerDashboard');
    }

   
}
