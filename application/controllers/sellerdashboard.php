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

    public function loadChangeDPView()
    {

        $userName = "chathura";  //HARDCODED USERNAME
        $this->view("changeProfilePicture"); //load the view to change the profile picture
    }

    public function handleThePicture()
    {
        $userName = "chathura";  //HARDCODED USERNAME
        $user = $this->sellerDashboardModel->checkOlderDP($userName);

        //check whether there is an older profile picture
        if ($user['profilePicture']) {
            //delete the older profile picture from the system folder
            unlink("../public/assets/img/userImages/" . $user['profilePicture'] . "");
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
    }
}
