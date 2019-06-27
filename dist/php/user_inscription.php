<?php
header('Content-type: application/json');
require("connexion.php");

$mail = $_GET['mail'];
$mdp = $_GET['mdp'];
$name = $_GET['name'];
$firstname = $_GET['firstname'];



$reponse = $bdd->query('SELECT mail FROM user WHERE mail = "'.$mail.'"');
  if ($donnees = $reponse->fetch()){
  
$result = array("success" => false);
echo json_encode($result);
}else{

$add1 = uniqid();
$add2 = uniqid();
$salt = $add1.$mdp.$add2;
$mdphash = md5($salt);

$bdd->exec('INSERT INTO user (name, firstname, firstname2, firstname3, mail, mdphash, date_inscription, date_modification) VALUES("'.$name.'", "'.$firstname.'", "'.$add1.'", "'.$add2.'", "'.$mail.'", "'.$mdphash.'", CURDATE(), CURDATE())');

$reponse = $bdd->query('SELECT id_user FROM user WHERE mail = "'.$mail.'"');
  if ($donnees = $reponse->fetch()){}


    $sql = 'SELECT id_user FROM user WHERE mail = "'.$mail.'" AND mdphash="'.$mdphash.'" ';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result = array("success" => true,"tab" => $data);

}
  
  

?>