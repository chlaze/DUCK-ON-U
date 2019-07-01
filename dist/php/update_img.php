<?php
header('Content-type: application/json');
require("connexion.php");

$img = $_GET['img'];
$id_user = $_GET['id_user'];

if(isset($_GET['img']) AND isset($_GET['id_user'])){
$bdd->exec('UPDATE user SET img="'.$img.'" WHERE id_user="'.$id_user.'" ');

$result = array("success" => true);
echo json_encode($result);
}else{

$result = array("success" => false);
echo json_encode($result);

}
?>