<?php
session_start();
if(isset($_SESSION['login'])){
    header('Location: admin.php');
    exit();
};
if(!empty($_POST['UserName'])&&!empty($_POST['Password'])){
    $username= $_POST['UserName'];
    $password= $_POST['Password'];
    if($username==='aime' && $password==='password123'){
        $_SESSION['login']= $username;
        header('Location: admin.php');
        exit();
    }else{
        echo 'Identifiants incorrects';
    }
};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
    <form  method="post">
    <label for="UserName">UserName</label>
    <input type="text" name="UserName" id="UserName">
    <label for="password">Password</label>
    <input type="password" name="Password" id="Password">
    <button type="submit">Se connecter</button>
    <a href="index.php">Return home</a>
    </form>
    
</body>
</html>