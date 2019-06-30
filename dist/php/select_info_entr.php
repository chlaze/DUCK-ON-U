<?php
header('Content-type: application/json');
require("connexion.php");

$id_user = $_GET['id_user'];

    // $sql = 'SELECT * FROM user WHERE id_user="'.$id_user.'" ';
    // $stmt = $bdd->prepare($sql);
    // $stmt->execute();
    // $info_user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $sql = 'SELECT * FROM entreprises WHERE id_user="'.$id_user.'" ';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $entr = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $result = array("success" => true,"info_entr" => $info_user, "info_supp" => $entr);
$result = array("success" => true, "info_supp" => $entr);

echo json_encode($result);

?>