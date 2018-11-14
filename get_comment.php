<?php
  // connect
  $connect = include('./connect.php');

  $recipe_id = $_POST['id'];

  // all recipes
  $sql = "SELECT * FROM `comment` NATURAL JOIN (SELECT user_id,name,pic_path FROM `account`) AS account WHERE comment.recipe_id='{$recipe_id}'";
  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);

  // $sql2 = "SELECT created_at FROM recipe WHERE id='{$recipe_id}'";
  // $res = $db->prepare($sql);
  // $res->execute();
  // $rows['created_at'] = $res->fetchAll(PDO::FETCH_ASSOC);

  // json_encode
  header('Content-type: application/json');
  echo json_encode($rows);
?>
