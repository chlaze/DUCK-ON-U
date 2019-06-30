<?php
header('Content-type: application/json');
require("connexion.php");

$id_user = $_GET['id_user'];
$nom = $_GET['nom'];
$text = $_GET['texte'];
if(isset($_GET['img'])){
    $img = $_GET['img'];
}else{
    $img = null;
}



$bdd->exec('INSERT INTO articles(id_user, short_text, posted_by, url_img, date_post) VALUES("'.$id_user.'", "'.$text.'", "'.$nom.'", "'.$img.'", CURDATE()) ');


?>