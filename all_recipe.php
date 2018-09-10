<?php
  // connect
  $test = include('./connect.php');

  // all recipes
  echo '<h3>Ingredients: </h3>';
  $sql = "SELECT * FROM `recipe`";
  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);

  echo "<table>";
  echo "<tr><th>id</th><th>title</th><th>detail</th></tr>";
  foreach($rows as $row){
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td><a href='test.php?r_id=" . $row['id'] . "'>Click me</a></td>";
    echo "</tr>";
  }
  echo "</table>";


 ?>
