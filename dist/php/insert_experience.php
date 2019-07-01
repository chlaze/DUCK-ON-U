<?php
header('Content-type: application/json');
require("connexion.php");

$poste = $_GET['poste'];
$id_user = $_GET['id_user'];
$entreprise = $_GET['entreprise'];
$date_debut = $_GET['date_debut'];
$date_fin = $_GET['date_fin'];


if(isset($_GET['poste']) AND $_GET['poste']!="" AND isset($_GET['id_user']) AND $_GET['id_user']=!"" AND isset($_GET['entreprise']) AND $_GET['entreprise']!="" AND isset($_GET['date_debut']) AND $_GET['date_debut']!="" AND isset($_GET['date_fin']) AND $_GET['date_fin']!=""){
$bdd->exec('INSERT INTO experiences(id_user, nom, entreprise, date_deb, date_fin) VALUES("'.$id_user.'", "'.$poste.'", "'.$entreprise.'", "'.$date_debut.'", "'.$date_fin.'") ');


$reponse = $bdd->query('SELECT * FROM experiences WHERE id_user="'.$id_user.'" AND nom="'.$poste.'" AND entreprise="'.$entreprise.'" AND date_deb="'.$date_debut.'" AND date_fin="'.$date_fin.'"');
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