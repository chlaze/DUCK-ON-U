<?php
header('Content-type: application/json');
require("connexion.php");

$id_post = $_GET['id_post'];
$id_user = $_GET['id_user'];
$description = $_GET['descr'];


if(isset($_GET['id_post']) AND $_GET['id_post']!="" AND isset($_GET['id_user']) AND $_GET['id_user']=!"" AND isset($_GET['descr']) AND $_GET['descr']!=""){
$bdd->exec('INSERT INTO comment(id_user, id_post, description, date) VALUES("'.$id_user.'", "'.$id_post.'", "'.$description.'", CURDATE())');


$reponse = $bdd->query('SELECT * FROM comment WHERE id_user="'.$id_user.'" AND id_post="'.$id_post.'" AND description="'.$description.'" AND date=CURDATE()');
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