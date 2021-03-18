<?php

class database {


    public $host     = HOST;
    public $user     = USER;
    public $database = DATABASE;
    public $password = PASSWORD;

    public function __construct()
    {
    
        //Database connection
        $GLOBALS['db'] = mysqli_connect($this->host,$this->user,$this->password,$this->database);

        // Check connection
        if($GLOBALS['db'] === false)
        {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
   
       }



}


?>