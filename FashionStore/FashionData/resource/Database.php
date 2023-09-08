<?php
// $host = 'localhost';
 $username = 'root';
 //
 $dsn = 'mysql:host=localhost; dbname=fashion';
 $password = 'AngelAngel89';

 $connection = 1;
 
 try{

    $db = new PDO($dsn, $username, $password);

    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //echo "Connected? Good.";

}catch(PDOException $ex){

    echo "Connection failed." . "<br>" . $ex->getMessage();

    $connection = 0;

}

 ?>