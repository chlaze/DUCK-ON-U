<?php
header('Content-type: application/json');
require("connexion.php");

$type = $_GET['type'];
$id_user = $_GET['id_user'];
$nom_poste = $_GET['nom_poste'];


if(isset($_GET['type']) AND $_GET['type']!="" AND isset($_GET['id_user']) AND $_GET['id_user']=!"" AND isset($_GET['nom_poste']) AND $_GET['nom_poste']!=""){
$bdd->exec('INSERT INTO demandes(id_user, type, nom_poste) VALUES("'.$id_user.'", "'.$type.'", "'.$nom_poste.'") ');


$reponse = $bdd->query('SELECT * FROM demandes WHERE id_user="'.$id_user.'" AND type="'.$type.'" AND nom_poste="'.$nom_poste.'"');
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