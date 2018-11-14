<?php
	$connect = include('./connect.php');
	$email = $_POST['userName'];
	$password = $_POST['pwd'];

  $sql = "SELECT * from account";
	$res = $db->prepare($sql);
	$res->execute();

  header('Content-type: application/json');

  while($row = $res->fetch()){
    if(strcmp($email,$row['email'])==0){
      if(strcmp($password,$row['password'])==0){
        $row['login_status'] = "successful";
        // echo "successful";
        echo json_encode($row);
        return;
      }
    }
  }

  // echo "fail";
  $row['login_status'] = "fail";
  echo json_encode($row);
?>
