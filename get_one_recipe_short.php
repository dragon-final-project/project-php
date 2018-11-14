<?php
  // connect
  $connect = include('./connect.php');

  // try get recipe_id
  $r_id = $_POST['id'];

  // fetch
  $sql = "SELECT id, title, img_path, name FROM `recipe` JOIN `account` WHERE recipe.id='{$r_id}'";
  $res = $db->prepare($sql);
  $res->execute();
  $row = $res->fetch(PDO::FETCH_ASSOC);
  // append
  $data = $row;

  // json_encode
  header('Content-type: application/json');
  echo json_encode($data);

 ?>
