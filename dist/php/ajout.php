<?php
header('Content-type: application/json');
require("connexion.php");
$sql = "INSERT INTO gonz VALUES (null,?,?,?)";
$stmt = $bdd->prepare($sql);
$stmt->execute(array($_POST["nom"],$_POST["prenom"],$_POST["note"]));
$result = array("success" => true,"id" => $bdd->lastInsertId());
echo json_encode($result);
?>