<?php
class invoice extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
        $this->model = $this->model('invoiceModel');
    }

    public function get($jobID)
    {
        $data=$this->model->getAll($jobID);
        $data['buyer']=$this->model->getBuyer($jobID);
        $this->view("invoiceView",$data);
    }
}
?>