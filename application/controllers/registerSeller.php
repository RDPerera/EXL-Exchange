<?php
    class registerSeller extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            $this->registerModel = $this->model('registerSellerModel');
        }
        public function index()
        {
            /*Initially No errors*/
            $userName = "";
            $email    = "";
            $errors = array(); 
            $errors["userName"]="";
            $errors["firstname"]="";
            $errors["lastname"]="";
            $errors["dob"]="";
            $errors["password"]="";
            $errors["email"]="";
            $errors["agreement"]="";
            $data['errors']=$errors;
            $this->helper("linker");
            $this->view("registerSellerView",$data);
           
        }
        
}

?>