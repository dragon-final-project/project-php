<?php
  // connect
  $connect = include('./connect.php');

  // $user_id = $_POST['user_id'];
  $user_id = "17";

  // all recipes
  $sql = "SELECT * FROM `my_favorite` " .
  "JOIN `recipe` ON my_favorite.recipe_id = recipe.id " .
  "JOIN `account` ON my_favorite.user_id = account.user_id " .
  "WHERE my_favorite.user_id='{$user_id}'";


  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);

  // json_encode
  header('Content-type: application/json');
  echo json_encode($rows);
?>
