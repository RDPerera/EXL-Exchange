<?php
    class helpHandle extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            $this->model = $this->model('helpHandleModel');
             $this->helper('mail');
        }

        public function index()
        {
            $data=array();
            $results=$this->model->fetchData();
            $data['results']=$results;
            $this->view("helpHandleView",$data);
        }

        public function attend($ticketId)
        {
           
            $actionStatus="Solved";
            $email=$_POST['mail'];
            $Body=$AltBody=$_POST['solution'];
            $user = $this->model->attend( $actionStatus,$ticketId);
            sendMail( $email,"","Respond For Your Help Request",$Body,$AltBody);
            $this->redirect('helpHandle');

        }
    }   
?>