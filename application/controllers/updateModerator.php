<?php
    class updateModerator extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            $this->model = $this->model('updateModeratorModel');
        }

        public function index()
        {
            $data=array();
            $results=$this->model->fetchModerators();
            $data['results']=$results;
            $this->view("deleteModeratorView",$data);
        }

        public function update($id)
        {          
            $data = $this->model->fetchModeratorData($id);
            $this->view("updateModeratorView",$data);
            if(isset($_POST['firstname']))
            {
                $firstname= $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $startdate= $_POST['startdate'];
                $this->model->updateUser($firstname , $lastname , $startdate,$email,$id);
            }
        }
    }
?>