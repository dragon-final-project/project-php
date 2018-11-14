<?php
	$connect = include('./connect.php');
  $user_id = $_POST['user_id'];
	$id = $_POST['id'];

  $sql = "SELECT recipe_id FROM my_favorite WHERE user_id='{$user_id}'";
  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);

  // json_encode
  header('Content-type: application/json');
  echo json_encode($rows);
?>
