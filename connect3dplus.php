<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=3dplus", "root", "");
        $query = $db->prepare("SELECT * FROM klant");
        $query->execute();
    } catch(PDOException $e) {
        die("ERROR!: " . $e->getMessage());
    }
?>