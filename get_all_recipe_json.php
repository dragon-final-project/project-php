<?php
  // connect
  $connect = include('./connect.php');

  // all recipes
  $sql = "SELECT * FROM `recipe`";
  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);

  // json_encode
  header('Content-type: application/json');
  echo json_encode($rows);

?>
