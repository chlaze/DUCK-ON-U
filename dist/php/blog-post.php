<?php
header('Content-type: application/json');
require("connexion.php");

    $sql = "SELECT * FROM articles WHERE id = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array($_GET["id"]));

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result = array("success" => true,"tab" => $data);
echo json_encode($result);
?>