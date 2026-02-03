
<?php
//Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=database;charset=utf8', 'root', '');

//Récupération des articles
$requete ="SELECT * FROM articles ORDER BY date_publication DESC";
$requete = $db->prepare($requete);
$requete->execute();

$articles = $requete->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body class="index">
    <h1>Bienvenu sur mon blog</h1>
    <a href="login.php">admin</a>
    <?php  foreach($articles as $article): ?>
        <article>
       <h2><?php echo htmlspecialchars($article['titre']); ?></h2>
        
        <p>Publié le : <?php echo $article['date_publication']; ?></p>
        
        <a href="article.php?id=<?php echo $article['id']; ?>" class="link">Lire la suite</a>
        </article>
      
     
    <?php endforeach; ?>
</body>
</html>