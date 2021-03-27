<?php
class sharePoint extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
        $this->shareModel = $this->model('sharePointModel');
        $this->sellerDashboardModel = $this->model('sellerDashboardModel');
    }

    public function index()
    {
        // Get the relevent file list
        $data['files']=$this->shareModel->fileList();
        $data['buyer']=$this->getSession('buyer');

        $userName = $this->getSession('userName');
        //retrieving user data from the database
        $user = $this->sellerDashboardModel->retrieveUser($userName);

        if ($user) {

            $data[0][0] = $user['firstName'];
            $data[0][1] = $user['lastName'];
            $data[0][2] = $user['profilePicture'];
            $data[0][3] = $user['dob'];
            $data[0][4] = $user['email'];
            $data[0][5] = $user['mainRate'];
            $data[0][6] = $user['communicationRate'];
            $data[0][7] = $user['deliveringRate'];
        }

        $this->view("sharePointView",$data);
    }
    //Movethe file to Upload dir and track the change in DB
    public function uploadFile()
    {
        //replace with session data
        $jobId=$this->getSession('jobId');
        $buyerId=$this->getSession('buyer');


        //Load Mormal View
        $data['files']=$this->shareModel->fileList();
        $this->view("sharePointView",$data);

        //Normal Resource Upload
        if (isset($_POST['save'])){
            $filename = $_FILES['myfile']['name'];
            $destination = BASEURL.'/public/assets/uploads/' . $filename;
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $size = $_FILES['myfile']['size'];
            //file type checkup
            if (!in_array($extension, ['zip', 'tar', 'rar','pdf'])) {
                echo "<div class='fullpage'>
                <div class='loadercontainer'>
                        <img src='".icoIMG('faild.png')."' alt='faild' class='sucess'> 
                    <div class='faild-text'>Invalid File Format!</div>
                </div>
                </div>";
            } 
            //file size checkup
            elseif ($_FILES['myfile']['size'] > 1000000) {
                
                echo "<div class='fullpage'>
                        <div class='loadercontainer'>
                                <img src='".icoIMG('faild.png')."' alt='success' class='sucess'> 
                            <div class='faild-text'>File Size Must Be < 1GB !</div>
                        </div>
                        </div>";
            }
            else{
                echo "<div class='fullpage'>
                <div class='loadercontainer'>
                    <div class='loader'></div>
                    <div class='progress'>Uploading...</div>
                </div>
                </div>";
                if (ob_get_length()) {
                    ob_end_flush();
                    flush();
                }
                sleep(2);
                if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $destination)  or 1) {
                    if ($this->shareModel->fileUpload($filename,$size,$jobId)) {
                        echo "<div class='fullpage'>
                        <div class='loadercontainer'>
                            <img src='".icoIMG('success.png')."' alt='success' class='sucess'> 
                            <div class='sucess-text'>Successfully Uploaded ! </div>
                            <a class='backlink' href='".BASEURL."/sharePoint'><div class='back'>Back To SharePoint</div></a>
                        </div>
                        </div>";
                    }   
                } 
                else {
                    echo "<div class='fullpage'>
                    <div class='loadercontainer'>
                        <img src='".icoIMG('faild.png')."' alt='faild' class='sucess'> 
                        <div class='faild-text'>Upload Faild !</div>
                    </div>
                    </div>";

                }
            }
        }
        //Final Product Upload
        if (isset($_POST['finalsave'])){
            echo "<div class='fullpage'>
            <div class='loadercontainer'>
                <div class='loader'></div>
                <div class='progress'>Uploading...</div>
            </div>
            </div>";
            if (ob_get_length()) {
                ob_end_flush();
                flush();
            }
            sleep(2);
            $filename = $_FILES['filex']['name'];
            $destination = BASEURL.'/public/assets/uploads/' . $filename;
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $size = $_FILES['filex']['size'];
            //file type checkup
            if (!in_array($extension, ['zip', 'tar', 'rar','pdf'])) {  
                echo "<div class='fullpage'>
                <div class='loadercontainer'>
                        <img src='".icoIMG('faild.png')."' alt='faild' class='sucess'> 
                        <div class='faild-text'>Invalid File Format!</div>
                </div>
                </div>";
            }
            else{
                if (move_uploaded_file($_FILES["filex"]["tmp_name"], $destination)  or 1) {

                    if ($this->shareModel->productUpload($filename,$size,$jobId,$_POST['dis'])) {
                        if(isset($_POST['final']))
                        {
                            $this->shareModel->updateRate($buyerId,$_POST['rate']);
                            echo $buyerId.$_POST['rate'];
                        }
                        echo "<div class='fullpage'>
                        <div class='loadercontainer'>
                                <img src='".icoIMG('success.png')."' alt='success' class='sucess'> 
                            <div class='sucess-text'>Successfully Uploaded ! </div>
                            <a class='backlink' href='".BASEURL."/sharePoint'><div class='back'>Back To SharePoint</div></a>
                        </div>
                        </div>";
                    }

                } 
                else {
                    echo "<div class='fullpage'>
                    <div class='loadercontainer'>
                            <img src='".icoIMG('faild.png')."' alt='faild' class='sucess'> 
                        <div class='faild-text'>Upload Faild !</div>
                    </div>
                    </div>";

                }
            }
        }
    }
}
?>