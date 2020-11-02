<?php 
    $username = 'root';
    $dsn = 'mysql:host=localhost; dbname=user-authentication-system';
    $password = '';

    try{
        //create an instance of the PDO class with the required parameters
        $db = new PDO($dsn, $username, $password);

        //set pdo error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
        //display success message
        //echo "You have successfully connected to the db";

    }catch (PDOException $ex){
        //display error message
        echo "Connection failed ".$ex->getMessage();
    }
?>