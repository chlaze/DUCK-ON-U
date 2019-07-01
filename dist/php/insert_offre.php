<?php
header('Content-type: application/json');
require("connexion.php");

$type = $_GET['type'];
$id_user = $_GET['id_user'];
$name = $_GET['name'];
$date_deb = $_GET['date_deb'];
$poste = $_GET['poste'];
$img = $_GET['img'];


if(isset($_GET['type']) AND $_GET['type']!="" AND isset($_GET['id_user']) AND $_GET['id_user']=!"" AND isset($_GET['name']) AND $_GET['name']!="" AND isset($_GET['date_deb']) AND $_GET['date_deb']!="" AND isset($_GET['poste']) AND $_GET['poste']!=""){
$bdd->exec('INSERT INTO offre(id_user, type, nom, poste, date_deb, statut, img) VALUES("'.$id_user.'", "'.$type.'", "'.$name.'", "'.$poste.'", "'.$date_deb.'", 1, "'.$img.'") ');


$reponse = $bdd->query('SELECT * FROM offre WHERE id_user="'.$id_user.'" AND type="'.$type.'" AND nom="'.$name.'" AND poste="'.$poste.'" AND date_deb="'.$date_deb.'" AND statut=1 AND img="'.$img.'"');
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