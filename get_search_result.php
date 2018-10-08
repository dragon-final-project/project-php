<?php
	$connect = include('./connect.php');
	//$id = $_POST['id'];
  $id = "0000631d90";
  $id2 = "00003a70b1";

  $sql = "SELECT * FROM recipe WHERE id='00003a70b1'";
  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);

  // json_encode
  header('Content-type: application/json');
  echo json_encode($rows);
?>
