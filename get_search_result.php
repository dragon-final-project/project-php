<?php
	$connect = include('./connect.php');
	$id = $_POST['id'];

	for($i=0;$i<count($id);$i++){
		$sql = "SELECT created_at FROM recipe WHERE id='{$id[$i]}'";
		$res = $db->prepare($sql);
	  $res->execute();
		$rows = $res->fetch();
	}


  // json_encode
  header('Content-type: application/json');
  echo json_encode($rows);
?>
