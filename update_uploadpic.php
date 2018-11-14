<?php
	$connect = include('./connect.php');
  $upload_id = $_POST['upload_id'];
  $retr_main = $_POST['retr_main'];
  $retr_else = $_POST['retr_else'];

	$sql = "UPDATE model_uploadpic SET retr_main='{$retr_main}', retr_else='{$retr_else}' WHERE id='{$upload_id}'";
  echo $sql;
  $res = $db->prepare($sql);
  $res->execute();

  // json_encode
  header('Content-type: application/json');
  //echo json_encode($rows);
  echo "successful";
?>
