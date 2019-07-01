<?php
header('Content-type: application/json');
require("connexion.php");

    
    $sql = 'SELECT * FROM user';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['id_post']) AND $_GET['id_post']!=""){    
    $sql = 'SELECT * FROM comment WHERE id_post="'.$_GET['id_post'].'"';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $comment = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else{
    $sql = 'SELECT * FROM comment';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $comment = $stmt->fetchAll(PDO::FETCH_ASSOC);    
    }
    
    
    
    $sql = 'SELECT * FROM articles';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $post = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = 'SELECT * FROM offre';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $offres = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = 'SELECT * FROM demandes';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $demandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    

    
    
$result = array("success" => true, "user" => $user, "comment" => $comment, "post" => $post, "offres"  => $offres, "demandes"  => $demandes);
echo json_encode($result);
?>