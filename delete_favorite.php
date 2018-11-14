<?php
	$connect = include('./connect.php');
  $user_id = $_POST['user_id'];
	$id = $_POST['id'];

  $sql = "DELETE FROM my_favorite WHERE user_id='{$user_id}' AND recipe_id='{$id}'";
	$res = $db->prepare($sql);
	$res->execute();

  $sql2 = "SELECT recipe_id FROM my_favorite WHERE user_id='{$user_id}'";
  $res = $db->prepare($sql2);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);

  // json_encode
  header('Content-type: application/json');
  echo json_encode($rows);
?>
