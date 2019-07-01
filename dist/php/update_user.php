<?php
header('Content-type: application/json');
require("connexion.php");


$name = $_GET['name'];
$firstname = $_GET['firstname'];
$birth = $_GET['birth'];
$sexe = $_GET['sexe'];
$grade = $_GET['grade'];
$adresse = $_GET['adresse'];
$formation = $_GET['formation'];
$mail = $_GET['mail'];
$phone = $_GET['phone'];
$id_user = $_GET['id_user'];



if(isset($_GET['name']) AND isset($_GET['firstname']) AND isset($_GET['birth']) AND isset($_GET['sexe']) AND isset($_GET['grade']) AND isset($_GET['adresse']) AND isset($_GET['formation']) AND isset($_GET['mail']) AND isset($_GET['phone'])){
$bdd->exec('UPDATE user SET name="'.$name.'", firstname="'.$firstname.'", birth="'.$birth.'", sexe="'.$sexe.'", grade="'.$grade.'", adresse="'.$adresse.'", formation="'.$formation.'", mail="'.$mail.'", phone="'.$phone.'", date_modification=CURDATE() WHERE is_user="'.$id_user.'" ');

$result = array("success" => true);
echo json_encode($result);
}else{

$result = array("success" => false);
echo json_encode($result);

}
?>