<?php
    class deleteModerator extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            $this->model = $this->model('deleteModeratorModel');
        }

        public function index()
        {
            $data=array();
            $results=$this->model->fetchModerators();
            $data['results']=$results;
            $this->view("deleteModeratorView",$data);
        }

        public function delete($id)
        {
            $this->model->deleteUser($id);
        }
    }
?>