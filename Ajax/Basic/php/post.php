<?php
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=mike', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

  }catch( PDOException $e){

  }

  if(!empty($_POST)){
    $request = "SELECT FROM `users`(`name`, `website`, `password`, `phone`) VALUES (:name, :website, :password, :phone)";
    $stmt = $pdo->prepare($request);

    $stmt->bindParam(':name', $_POST["name"]);
    $stmt->bindParam(':website', $_POST["website"]);
    $stmt->bindParam(':password', $_POST["password"]);
    $stmt->bindParam(':phone', $_POST["phone"]);
    $stmt->execute();
    $mike = array("error"=>false, "id"=>$pdo->lastInsertId());
    echo json_encode($mike);
  }

?>
