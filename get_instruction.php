<?php
	$connect = include('./connect.php');
	$id = $_POST['id'];

  $sql = "SELECT step,text FROM instruction WHERE recipe_id='{$id}'";
  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);

  // json_encode
  header('Content-type: application/json');
  echo json_encode($rows);
?>
