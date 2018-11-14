<?php
	$connect = include('./connect.php');
  $user_id = $_POST['user_id'];
  $name = $_POST['etName'];
  $pwd = $_POST['etPwd'];
  $birth = $_POST['etBirth'];
	$pic_path = $_POST['pic_path'];

  if($name){
    $sql = "UPDATE account SET name='{$name}' WHERE user_id='{$user_id}'";
    $res = $db->prepare($sql);
    $res->execute();
    //$rows = $res->fetchAll(PDO::FETCH_ASSOC);
  }
	if($pic_path){
    $sql = "UPDATE account SET pic_path='{$pic_path}' WHERE user_id='{$user_id}'";
    $res = $db->prepare($sql);
    $res->execute();
  }

  // json_encode
  header('Content-type: application/json');
  //echo json_encode($rows);
  echo "successful";
?>
