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
        $data['files']=$this->shareModel->fileList();
        $this->view("sharePointView",$data);
    }
    public function uploadFile()
    {
            $filename = $_FILES['myfile']['name'];
            $destination = BASEURL.'/public/assets/uploads/' . $filename;
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $file = $_FILES['myfile']['tmp_name'];
            $size = $_FILES['myfile']['size'];
            if (!in_array($extension, ['zip', 'tar', 'rar','pdf'])) {
                echo "You file extension must be .zip, .rar or .tar";
            } elseif ($_FILES['myfile']['size'] > 1000000) { 
                echo "File too large!";
            } else {
                if (move_uploaded_file($file, $destination)) {
                    if ($this->shareModel->fileUpload($filename,$size,0)) {
                        echo "File uploaded successfully";
                    }
                } else {  

                    echo "ERROR : Upload(".$_FILES['myfile']['error'].")<br>";
                    echo "Failed to upload file.";
                }
            }
    }
}
?>