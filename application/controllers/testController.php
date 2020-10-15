<?php 

class testController extends exlFramework{

    public function __construct(){

          $this->testModel = $this->model('testModel'); 
        
    }


    public function exl(){
        echo "test controller - exl method";
        $this->testModel->func('23','34');
    }


}

?>