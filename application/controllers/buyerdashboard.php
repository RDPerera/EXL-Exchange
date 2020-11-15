<?php
class buyerDashboard extends exlFramework
{
    public function __construct()
        {
            $this->helper("linker");
            $this->ads = $this->model('homeModel');
            $this->model=$this->model('buyerDashboardModel');
            $this->sellerDashboardModel = $this->model('sellerDashboardModel');
        }
        public function index(){
            /*Get DATA for Ad Categories */
            $data['popular']=$this->ads->getAdsPopular();
            $data['new']=$this->ads->getAdsNew();
            $data['noob']=$this->ads->getAdsNoob();
            $data['userName']=$userName=$this->getSession("userName");
            $data["profilePic"]=$this->model->checkOlderDP($userName);
            /*Render View */
            $this->view("buyerDashboardView",$data);

    
        }
        public function loadChangeDPView()
        {
            $this->view("changeProfilePictureBuyer"); //load the view to change the profile picture
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
            $this->redirect('buyerdashboard');
        }
}
?>