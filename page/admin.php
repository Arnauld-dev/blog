<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: login.php');
    exit();
};
try{
    $db = new PDO('mysql:host=localhost;dbname=database;charset=utf8', 'root', '');
}catch(Exception $e){
    die('Error : '.$e->getMessage());   
};
if(!empty($_POST['titre'])||!empty($_POST['contenu'])){
    $titre= $_POST['titre'];
    $contenu= $_POST['contenu'];
    $requete = "INSERT INTO articles (titre,contenu,date_publication) VALUES(?,?,NOW())";
    $requete = $db->prepare($requete);
    $requete->execute(array($titre,$contenu));

    
    header('Location: admin.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="admin">
    <a href="deconnect.php">Deconnexion</a>
    <h1 >Page d'administration</h1>
    
    <form action="" method="post">
        <label for="titre">Titre article</label>
        <input type="text" name="titre" id="titre">
        <label for="contenu">Contenu article</label>
        <textarea name="contenu" id="contenu" cols="30" rows="10"></textarea>
        
        <button type="submit">Publier l'article</button>
    </form>
    <h2>Gerer les articles existants</h2>
    <?php
    $requete ="SELECT * FROM articles ORDER BY date_publication DESC";
    $requete = $db->prepare($requete);
    $requete->execute();
    $articles = $requete->fetchAll();
    
    foreach($articles as $article): ?>
    <ul>
        <li><?php echo htmlspecialchars($article['titre']); ?></li>
        <a href="edit.php?id=<?php echo $article['id']; ?>">Modifier</a>
        <a href="delete.php?id=<?php echo $article['id']; ?>">Supprimer</a>
        
    </ul>
      
        
   <?php endforeach; ?>

</body>
</html>