<?php
/**
 * Connexion à la base de données
 */
function connexionDB(){
    try{
        $db = new PDO("mysql:host=mysql-escaperoom.alwaysdata.net;dbname=escaperoom_escape", "311537", "esenmanager");
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
    catch(PDOException $exception){
        die($exception->getMessage());
    }
}
?>