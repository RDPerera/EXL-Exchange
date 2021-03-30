<?php
    class allModerators extends exlFramework
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
            $this->view("allModeratorView",$data);
        }
        public function mod()
        {
            $data=array();
            $results=$this->model->fetchModerators();
            $data['results']=$results;
            $this->view("allModeratorViewMod",$data);
        }


    }
?>