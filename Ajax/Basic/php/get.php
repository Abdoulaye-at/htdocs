<?php
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=mike', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

  }catch( PDOException $e){

  }

  $result = $pdo->query("SELECT * FROM users");
  $users = $result->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($users);
