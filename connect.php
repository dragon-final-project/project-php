<?php
  $servername = "localhost";
  $username = "root";
  $password = "smalldragon487";
  $db_name = "project";

  try{
    $db = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
  }
  catch(PDOException $e){
    echo $db_name;
    echo "Connection failed: " . $e->getMessage();
  }
?>
