<?php
  // connect
  $connect = include('./connect.php');

  // try get recipe_id
  if(isset($_GET['r_id'])){
    $r_id = $_GET['r_id'];
  }
  else {
    // get a default recipe id if no given r_id
    $r_id = '000035f7ed';
  }

  // fetch
  $sql = "SELECT * FROM `recipe` WHERE id='{$r_id}'";
  $res = $db->prepare($sql);
  $res->execute();
  $row = $res->fetch(PDO::FETCH_ASSOC);
  // append
  $data = $row;

  // ingredients
  $sql = "SELECT * FROM `ingredient` WHERE recipe_id='{$r_id}' ORDER BY step";
  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);
  // append
  $data['ingredients'] = $rows;

  // instructions
  $sql = "SELECT * FROM `instruction` WHERE recipe_id='{$r_id}' ORDER BY step";
  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);
  // append
  $data['instructions'] = $rows;

  header('Content-type: application/json');
  echo json_encode($data);

 ?>
