<?php
header('Content-type: application/json');
require("connexion.php");

if(isset($_GET['id_user'])){
    $id_user = $_GET['id_user'];

    $sql = 'SELECT * FROM offre WHERE statut=1 AND id_user=' .$id_user. ' ';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $offre = $stmt->fetchAll(PDO::FETCH_ASSOC);
}else {
    $sql = 'SELECT * FROM offre WHERE statut=1';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $offre = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    
$result = array("success" => true, "offre" => $offre);
echo json_encode($result);
?>