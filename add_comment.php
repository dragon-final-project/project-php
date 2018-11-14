<?php
	$connect = include('./connect.php');
	$user_id = $_POST['user_id'];
	$id = $_REQUEST['id'];
  $time = date("Y-m-d H:i:s");
  $star = (float)$_POST['star'];
  $context = $_POST['context'];

  $sql = "INSERT INTO comment (user_id,recipe_id,_time,star,context) VALUES (:user_id,:recipe_id,:_time,:star,:context)";
	$res = $db->prepare($sql);
	$res->execute(array(
		':user_id'    => $user_id,
		':recipe_id'     => $id,
    ':_time'       => $time,
    ':star'       => $star,
    ':context'    => $context
	));

	// count recipe's avg_star
	$sql = "SELECT COUNT(*) AS count, SUM(star) AS sum FROM `comment` WHERE recipe_id='{$id}'";
	$res = $db->prepare($sql);
	$res->execute();
	$row = $res->fetch(PDO::FETCH_ASSOC);
	$avg_star = $row['sum'] / $row['count'];

	// update recipe's avg_star
	$sql = "UPDATE `recipe` SET avg_star = {$avg_star} WHERE id = '{$id}'";
	$res = $db->prepare($sql);
	$res->execute();
?>
