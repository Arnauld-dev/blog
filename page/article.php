<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=database;charset=utf8', 'root', '');
}catch(Exception $e){
    die('Error : '.$e->getMessage());
};

$id=$_GET['id'];
$requete ="SELECT * FROM articles WHERE id=?";
$requete = $db->prepare($requete);
$requete->execute(array($id));
$article = $requete->fetch();
if(!$article){
    die('Article non trouvé');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="article">
    <a href="index.php">Retour </a>
    <h1><?php echo htmlspecialchars($article['titre']); ?></h1>
    <p>Publié le : <?php echo $article['date_publication']; ?></p>
    
        <?php echo htmlspecialchars($article['contenu']); ?>
    </div>

</body>
</html>

