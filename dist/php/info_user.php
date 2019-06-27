<?php
header('Content-type: application/json');
require("connexion.php");

$id_user = $_GET['id_user'];

    $sql = 'SELECT * FROM user WHERE id_user="'.$id_user.'" ';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $info_user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $sql = 'SELECT * FROM skills WHERE id_user="'.$id_user.'" ';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $skills = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $sql = 'SELECT * FROM profil WHERE id_user="'.$id_user.'" ';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $profil = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = 'SELECT * FROM experiences WHERE id_user="'.$id_user.'" ';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $exp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    



$result = array("success" => true,"info_user" => $info_user, "skills" => $skills, "profil" => $profil, "exp" => $exp);
echo json_encode($result);

?>