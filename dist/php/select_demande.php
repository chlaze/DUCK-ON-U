<?php
header('Content-type: application/json');
require("connexion.php");

    
    $sql = 'SELECT user.id_user AS id_user, name, firstname, type, nom_poste FROM demandes LEFT JOIN user ON demandes.id_user=user.id_user';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $demande = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
$result = array("success" => true, "demandes" => $demande);
echo json_encode($result);
?>