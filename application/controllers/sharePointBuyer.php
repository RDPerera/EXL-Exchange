<?php
class sharePointBuyer extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
        $this->shareModel = $this->model('sharePointModelBuyer');
        $this->model=$this->model('buyerDashboardModel');
    }

    public function index()
    {
        $jobId=$this->getSession("jobId");
        $data['userName']=$userName=$this->getSession("buyer");
        $data["profilePic"]=$this->model->checkOlderDP($userName);
        $data['isActive']=$this->shareModel->isActive($jobId);
        // Get the relevent file list   
        $data['files']=$this->shareModel->fileList($jobId);
        $this->view("sharePointViewBuyer",$data);
    }
    //Movethe file to Upload dir and track the change in DB
    public function uploadFile()
    {
        //replace with session data
        $jobId=$this->getSession("jobId");
        $sellerId=$this->getSession("seller");
        $data['userName']=$buyerId=$this->getSession("buyer");
        //Load Mormal View
        $data['files']=$this->shareModel->fileList($jobId);
        $data['isActive']=$this->shareModel->isActive($jobId);
        //$this->getSession("userName");
        $data["profilePic"]=$this->model->checkOlderDP($userName);

        $this->view("sharePointViewBuyer",$data);

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
                            <a class='backlink' href='".BASEURL."/sharePointBuyer'><div class='back'>Back To SharePoint</div></a>
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
            $this->shareModel->updateRateSeller($sellerId,$_POST['communicationRate'],$_POST['deliveryRate'],$_POST['mainRate']);
            $this->shareModel->updateAdRate($buyerId,$jobId,$_POST['dis'],$_POST['productRate']);
            echo "<div class='fullpage'>
                        <div class='loadercontainer'>
                            <img src='".icoIMG('success.png')."' alt='success' class='sucess'> 
                            <div class='sucess-text'>Job Status Changed Successfully! </div>
                            <a class='backlink' href='".BASEURL."/job'><div class='back'>Back To Prev Page</div></a>
                        </div>
                        </div>";
        }
    }
}
?>