<?php
	$connect = include('./connect.php');
  $user_id = $_POST['user_id'];

  $sql = "SELECT * FROM account WHERE user_id='{$user_id}'";
  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);

  // json_encode
  header('Content-type: application/json');
  echo json_encode($rows);
?>
