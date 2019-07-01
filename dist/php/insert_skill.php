<?php
header('Content-type: application/json');
require("connexion.php");

$pourcent = $_GET['pourcent'];
$id_user = $_GET['id_user'];
$nom_skill = $_GET['nom_skill'];


if(isset($_GET['pourcent']) AND $_GET['pourcent']!="" AND isset($_GET['id_user']) AND $_GET['id_user']=!"" AND isset($_GET['nom_skill']) AND $_GET['nom_skill']!=""){
$bdd->exec('INSERT INTO skills(id_user, name_skills, pourcent) VALUES("'.$id_user.'", "'.$nom_skill.'", "'.$pourcent.'") ');


$reponse = $bdd->query('SELECT * FROM skills WHERE id_user="'.$id_user.'" AND name_skills="'.$nom_skill.'" AND pourcent="'.$pourcent.'"');
if ($donnees = $reponse->fetch()){

$result = array("success" => true);
echo json_encode($result);

}else{

$result = array("success" => false);
echo json_encode($result);

}

}else{

$result = array("success" => false);
echo json_encode($result);

}
?>