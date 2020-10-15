<?php
// require_once 'core/app.php'

spl_autoload_register(function($className){include "core/$className.php";});

$router = new router;

?>