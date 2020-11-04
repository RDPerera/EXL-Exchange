<?php
class verification extends exlFramework
{
    public function __construct()
    {
        $this->helper('linker');
        $this->verificationModel = $this->model('verificationModel');
    }
    public function index()
    {
        $data['stateInvalid'] = "display:none";
        $data['stateAlready'] = "display:none";
        $data['stateSuccess'] = "display:none";
        $userName = $this->getSession('userName');
        $accountType = $this->getSession('accoutType');
        $fisrtName = $this->getSession('firstName');
        $lastName = $this->getSession('lastName');
        $data['email'] = $email = $this->getSession('email');
        $data['error'] = $error = "";
        $this->helper("linker");
        $this->view("verificationView",$data);
    }
}
?>