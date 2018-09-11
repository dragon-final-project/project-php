<?php
  // connect
  $connect = include('./connect.php');

  // all recipes
  $sql = "SELECT * FROM `recipe`";
  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);

  // $data = [];
  // foreach($rows as $row){
  //   $data
  // }
  // echo "</table>";

  // json_encode
  echo json_encode($rows);

?>
