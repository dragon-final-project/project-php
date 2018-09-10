<?php
  // connect
  $test = include('./connect.php');

  // all recipes
  echo '<h2>All recipes: </h3>';
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
    echo "<td><a href='get_one_recipe.php?r_id=" . $row['id'] . "'>Click me</a></td>";
    echo "</tr>";
  }
  echo "</table>";


 ?>
