<?php
header('Content-type: application/json');
require("connexion.php");
$sql = "DELETE FROM `gonz` WHERE id_gonz = ?";
$stmt = $bdd->prepare($sql);
$stmt->execute(array($_POST["id"]));
$result = array("success" => true,"gonz" => $_POST["id"]);
echo json_encode($result);
?>