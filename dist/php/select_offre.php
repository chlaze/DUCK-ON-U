<?php
header('Content-type: application/json');
require("connexion.php");

    
    $sql = 'SELECT * FROM offre WHERE statut=1';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $offre = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
$result = array("success" => true, "offre" => $offre);
echo json_encode($result);
?>