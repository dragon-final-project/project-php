<?php
	$connect = include('./connect.php');
	$title = $_REQUEST['title'];

  $sql = "SELECT * FROM `recipe` AS rec
    JOIN (SELECT user_id, name FROM `account`) AS account ON account.user_id=rec.creator_id
  WHERE title LIKE '%{$title}%'
  ORDER BY rand() LIMIT 5";


  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);

  // json_encode
  header('Content-type: application/json');
  echo json_encode($rows);
?>
