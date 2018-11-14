<?php
  // connect
  $connect = include('./connect.php');

  // all recipes
  $sql = "SELECT * FROM `recipe` JOIN (SELECT user_id, name FROM `account`) AS account ON account.user_id=recipe.creator_id WHERE img_path != 'none' ORDER BY id DESC LIMIT 8";
  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);

  // json_encode
  header('Content-type: application/json');
  echo json_encode($rows);

?>
