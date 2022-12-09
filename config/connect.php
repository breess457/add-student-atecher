<?php

    $localhost = "localhost";
    $user = "root";
    $passwd = "";
    $database = "may_let_home";
     $dbConfig = new mysqli($localhost,$user,$passwd,$database);
       mysqli_set_charset($dbConfig,'utf8');
       if(!$dbConfig){
           echo "not connect db !";
       }

?>