<?php
/*submiting a help request*/
    class helpSubmit extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            $this->model = $this->model('helpSubmitModel');
          /*  $this->helper('mail');*/
        }
        public function index()
        {
           $userName=$data['userName']='dilan';
            $this->view("helpSubmitView",$data);

            // $username=$data['userName']=$this->getSession('userName');
        }

        public function insert()
        {
            $userName =  $_POST['userName'];
            $description =  $_POST['description'];
            $issueType =  $_POST['issue'];
            $attachment = $_FILES["attachment"]["name"];//file name (attachment-input field name)

            //file upload
            $target_dir = "../public/assets/img/helpUpload/";
            $target_file = $target_dir . basename($_FILES["attachment"]["name"]);
            move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file);

            $user = $this->model->inserthelp($userName,$issueType, $description, $attachment);
            $userName=$data['userName']='dilan';
            $this->view('successfullView');
           
        }
    }
?>