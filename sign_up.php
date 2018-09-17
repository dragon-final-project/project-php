<?php
	$connect = include('./connect.php');
	$email = $_POST['userName'];
	$name = $_POST['name'];
	$password = $_POST['pwd'];
  $gender = '';
  $pic_path = '';

  $sql = "INSERT INTO account (email,name,password,gender,pic_path) VALUES (:email,:name,:password,:gender,:pic_path)";
	$res = $db->prepare($sql);
	$res->execute(array(
		':email'    => $email,
		':name'     => $name,
		':password' => $password,
    ':gender'   => $gender,
    ':pic_path' => $pic_path
	));

 	// echo json_encode($rows);
  echo 'hi';
?>
