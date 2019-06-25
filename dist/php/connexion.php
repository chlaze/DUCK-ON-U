<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=duckonu', "root", "root");
} catch (PDOException $e) {
    $result = array("success" => false, "error" => $e->getMessage());
}
?>