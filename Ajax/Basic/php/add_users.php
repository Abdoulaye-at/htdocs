<?php
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=mike', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

  }catch( PDOException $e){

  }

  if(!empty($_POST)){
    $request = "INSERT INTO `users`(`name`, `website`, `phone`) VALUES (:name, :website, :phone)";
    $stmt = $pdo->prepare($request);

    $stmt->bindParam(':name', $_POST["name"]);
    $stmt->bindParam(':website', $_POST["website"]);
    $stmt->bindParam(':phone', $_POST["phone"]);
    $stmt->execute();
    $mike = array("error"=>false, "id"=>$pdo->lastInsertId());
    echo json_encode($mike);
  }
?>
