<?php
header('Content-type: application/json');
require("connexion.php");

    $sql = "SELECT * FROM articles";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result = array("success" => true,"tab" => $data);
echo json_encode($result);
?>