<?php
header('Content-type: application/json');
require("connexion.php");

$id_post = $_GET['id_post'];
    
    $sql = 'SELECT id_comment, comment.id_user AS id_user, id_post, description, date, name, firstname FROM comment LEFT JOIN user ON comment.id_user=user.id_user WHERE comment.id_post="'.$id_post.'" ';
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $comment = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
$result = array("success" => true, "comment" => $comment);
echo json_encode($result);
?>