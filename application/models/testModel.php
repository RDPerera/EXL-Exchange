<?php

class testModel extends database {

    public function func($a,$b){
        $query= "INSERT INTO test (a,b) VALUES ('$a','$b')";
        mysqli_query($GLOBALS['db'], $query);
    }


}


?>