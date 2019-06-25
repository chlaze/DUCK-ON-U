<?php
header('Content-type: application/json');
require("connexion.php");
$sql = "UPDATE gonz SET nom = ?, prenom = ?, note_tchoin = ? WHERE id_gonz = ?";
$stmt = $bdd->prepare($sql);
$stmt->execute(array($_POST["nom"],$_POST["prenom"],$_POST["note"],$_POST["id"]));
$result = array("success" => true,"gonz" => $_POST["id"]);
echo json_encode($result);
?>