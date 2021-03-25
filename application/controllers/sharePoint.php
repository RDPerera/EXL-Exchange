<?php
class sharePoint extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
        $this->shareModel = $this->model('sharePointModel');
    }

    public function index()
    {
        // Get the relevent file list
        $data['files']=$this->shareModel->fileList();
        $this->view("sharePointView",$data);
    }
    //Movethe file to Upload dir and track the change in DB
    public function uploadFile()
    {
        //replace with session data
        $jobId=123;
        $buyerId='chathura';

        //Load Mormal View
        $data['files']=$this->shareModel->fileList();
        $this->view("sharePointView",$data);

        //Normal Resource Upload
        if (isset($_POST['save'])){
            $filename = $_FILES['myfile']['name'];
            $destination = BASEURL.'/public/assets/uploads/' . $filename;
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $size = $_FILES['myfile']['size'];

            if (!in_array($extension, ['zip', 'tar', 'rar','pdf'])) {
                echo "<div class='fullpage'>
                <div class='loadercontainer'>
                        <img src='".icoIMG('faild.png')."' alt='faild' class='sucess'> 
                    <div class='faild-text'>Invalid File Format!</div>
                </div>
                </div>";
            } 
            elseif ($_FILES['myfile']['size'] > 1000000) {
                
                echo "<div class='fullpage'>
                        <div class='loadercontainer'>
                                <img src='".icoIMG('faild.png')."' alt='success' class='sucess'> 
                            <div class='faild-text'>File Size Must Be < 1GB !</div>
                        </div>
                        </div>";
            }
            else{
                // echo "<div class='fullpage'>
                // <div class='loadercontainer'>
                //     <div class='loader'></div>
                //     <div class='progress'>Uploading...</div>
                // </div>
                // </div>";
                // if (ob_get_length()) {
                //     ob_end_flush();
                //     flush();
                // }
                // sleep(2);
                if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $destination)  or 1) {
                    if ($this->shareModel->fileUpload($filename,$size,$jobId)) {
                        echo "<div class='fullpage'>
                        <div class='loadercontainer'>
                            <img src='".icoIMG('success.png')."' alt='success' class='sucess'> 
                            <div class='sucess-text'>Successfully Uploaded ! </div>
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