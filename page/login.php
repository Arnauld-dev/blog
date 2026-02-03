<?php
session_start();
if(isset($_pOST['UserName'])&& isset($_POST['Password'])){
    if(!empty($_POST['UserName']) || !empty($_POST['Password'])){
    $username = $_POST['UserName'];
    $password = $_POST['Password'];
    //valide login for admin
    $valid_username = 'admin';
    $valid_password = '123';
     
      if($username === $valid_username && $password === $valid_password){
        $_SESSION['login'] = $valid_password;
        header('Location: admin.php');
        exit();
       }else{
        echo 'Nom d\'utilisateur ou mot de passe incorrect.';
        };

        
    }else{
        echo 'Veuillez remplir tous les champs.';
    };
    
};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="post">
    <label for="UserName">UserName</label>
    <input type="text" name="UserName" id="UserName">
    <label for="password">Password</label>
    <input type="password" name="Password" id="Password">
    <button type="submit">Se connecter</button>
    </form>
</body>
</html>