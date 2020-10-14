<?php

class exlFramework
{
    public function model($modelName){

        if(file_exists("../../src/models/" . $modelName . ".php"))
        {
            require_once "../../src/models/$modelName.php";
            return new $modelName;
    
          } else 
          {
            echo "$modelName.php file not found";
          }
    }

    public function view($viewName, $data = []){

        if(file_exists("../../src/views/" . $viewName . ".php"))
        {   
           require_once "../../src/views/$viewName.php";
   
        } else {
           echo "$viewName.php file not found";
        }
   
      }

    public function input($inputName){

        if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == 'post'){
  
           return trim(strip_tags($_POST[$inputName]));
  
        } else if($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'get'){
  
           return trim(strip_tags($_GET[$inputName]));
  
        }
  
     }
     
     //session management - UNFINISHED

}

?>