<?php
  // connect
  $test = include('./connect.php');

  // try get recipe_id
  if(isset($_GET['r_id'])){
    $r_id = $_GET['r_id'];
  }
  else {
    $r_id = '000035f7ed';
  }

  // fetch
  $sql = "SELECT * FROM `recipe` WHERE id='{$r_id}'";
  $res = $db->prepare($sql);
  $res->execute();
  $row = $res->fetch(PDO::FETCH_ASSOC);

  echo '<h2>' . $row['title'] . '</h2>';
  echo '<h3>ID: ' . $row['id'] . '</h3>';
  echo '<h3>Created_at: ' . $row['created_at'] . '</h3>';

  // ingredients
  echo '<h3>Ingredients: </h3>';
  $sql = "SELECT * FROM `ingredient` WHERE recipe_id='{$r_id}' ORDER BY step";
  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);

  echo "<ol>";
  foreach($rows as $row){
    echo '<li>' . $row["text"] . '</li>';
  }
  echo "</ol>";

  // instructions
  echo '<h3>Instructions: </h3>';
  $sql = "SELECT * FROM `instruction` WHERE recipe_id='{$r_id}' ORDER BY step";
  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);

  echo "<ol>";
  foreach($rows as $row){
    echo '<li>' . $row["text"] . '</li>';
  }
  echo "</ol>";

 ?>
