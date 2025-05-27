<?php

require_once('config.php');

function db_connect(){
  try{
    $dbConnection = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USER, DB_PASS);
    
    return $dbConnection;
  }
    catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}

?>