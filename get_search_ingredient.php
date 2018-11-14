<?php
	$connect = include('./connect.php');
	$ingr = $_REQUEST['ingredient'];

	// $f = fopen("text.txt", "w") or die("Unable to open file!");;
	// fwrite($f, gettype($ingr));
	// fclose($f);
	// echo gettype($ingr);

  $sql = "SELECT * FROM `recipe` AS rec
    JOIN (SELECT user_id, name FROM `account`) AS account ON account.user_id=rec.creator_id
  WHERE rec.img_path != 'none' AND rec.id IN
    (SELECT ingr.recipe_id FROM `ingredient` AS ingr WHERE text LIKE '%{$ingr[0]}%')
  ORDER BY rand() LIMIT 5";


  $res = $db->prepare($sql);
  $res->execute();
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);

  // json_encode
  header('Content-type: application/json');
  echo json_encode($rows);
?>
