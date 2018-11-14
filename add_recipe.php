<?php
	$connect = include('./connect.php');
  $id = "";
	$creator_id = $_POST['creator_id'];
	$title = $_POST['title'];
  $created_at = date("Y-m-d H:i:s");
  $avg_star = 0;
  $img_path = "none";

  $text = $_POST['text']; //ingredients and number array
  $step = $_POST['step']; //instruction array

  $sql = "SELECT * from recipe";
	$res = $db->prepare($sql);
	$res->execute();

  $id = MakeRecipeId();
  while($row = $res->fetch()){
    if(strcmp($id,$row['id'])==0){
      $id = MakeRecipeId();
    }
  }

  try{
    $sql2 = "INSERT INTO recipe (id,creator_id,title,created_at,avg_star,img_path,source_type)
      VALUES (:id,:creator_id,:title,:created_at,:avg_star,:img_path,:source_type)";
  	$res = $db->prepare($sql2);
  	$res->execute(array(
  		':id'          => $id,
  		':creator_id'  => $creator_id,
      ':title'       => $title,
      ':created_at'  => $created_at,
      ':avg_star'    => $avg_star,
      ':img_path'    => $img_path,
			':source_type' => 'upload'
  	));
  }catch(PDOException $e){
    echo($e->getMessage());
  }

  try{
    $sql3 = "INSERT INTO ingredient (recipe_id,text,step)
      VALUES (:recipe_id,:text,:step)";
    $res = $db->prepare($sql3);
    for($i=0;$i<count($text);$i++){
      $res->execute(array(
    		':recipe_id'    => $id,
    		':text'         => $text[$i],
        ':step'         => (string)$i
    	));
    }
  }catch(PDOException $e){
    echo($e->getMessage());
  }

  try{
    $sql4 = "INSERT INTO instruction (recipe_id,text,step)
      VALUES (:recipe_id,:text,:step)";
  	$res = $db->prepare($sql4);
    for($i=0;$i<count($step);$i++){
      $res->execute(array(
    		':recipe_id'    => $id,
    		':text'         => $step[$i],
        ':step'         => (string)$i
    	));
    }
  }catch(PDOException $e){
    echo($e->getMessage());
  }

  function MakeRecipeId(){
    $digitArray = array("a","b","c","d","e","f");
    $recipe_id = "";

    for($i=0;$i<10;$i++){ //make a recipe id
      $digit = rand(0,15);
      if($digit>=10){
        $digit = $digitArray[$digit-10];
      }
      $recipe_id = $recipe_id . "" . $digit;
    }
    return $recipe_id;
  }

  // json_encode
  //header('Content-type: application/json');
  //echo json_encode($rows);
  echo "successful";
?>
