<?php
header('Content-type: application/json');
require("connexion.php");

$mail = $_GET['mail'];
$mdp = $_GET['mdp'];


$reponse = $bdd->query('SELECT * FROM user WHERE mail = "'.$mail.'"');
if ($donnees = $reponse->fetch()){}
$add1 = $donnees['firstname2'];
$add2 = $donnees['firstname3'];
$salt = $add1.$mdp.$add2;
$mdphash = md5($salt);


$reponse = $bdd->query('SELECT id_user FROM user WHERE mail = "'.$mail.'" AND mdphash="'.$mdphash.'" ');
  if ($donnees = $reponse->fetch()){
  
    $sql = 'SELECT id_user, name, firstname FROM user WHERE mail = "'.$mail.'" AND mdphash="'.$mdphash.'" ';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result = array("success" => true,"tab" => $data);
echo json_encode($result);  
  
  
  
  
  }else{ 
$result = array("success" => false);
echo json_encode($result);  
  }
?>