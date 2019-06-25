<?php
header('Content-type: application/json');
require("connexion.php");
if(isset($_GET["id"]))
{
    $sql = "SELECT * FROM gonz WHERE id_gonz = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array($_GET["id"]));
}
else
{
    $sql = "SELECT * FROM gonz";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
}
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result = array("success" => true,"gonz" => $data);
echo json_encode($result);
?>