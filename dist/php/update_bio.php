<?php
header('Content-type: application/json');
require("connexion.php");

$bio = $_GET['bio'];
$id_user = $_GET['id_user'];

if(isset($_GET['bio']) AND isset($_GET['id_user'])){
$bdd->exec('UPDATE profil SET bio="'.$bio.'" WHERE id_user="'.$id_user.'" ');

$result = array("success" => true);
echo json_encode($result);
}else{

$result = array("success" => false);
echo json_encode($result);

}
?>