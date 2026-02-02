<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=database;charset=utf8', 'root', '');
}catch(Exception $e){
    die('Error : '.$e->getMessage());   
};
$id = $_GET['id'];
$requete = "DELETE FROM articles WHERE id=?";
$requete = $db->prepare($requete);
$requete->execute(array($id));
header('Location: admin.php');

?>