<?php

session_start();
include("connection.php");

if (isset($_POST['user_name'])){
    $user_name = stripslashes($_REQUEST['user_name']);
    $user_name = mysqli_real_escape_string($con, $user_name);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $query = "select * from machine where user_name = '$user_name' and password='".hash('sha256', $password)."'";
    $result = mysqli_query($con, $query);
    $row = mysqli_num_rows($result);
    if($row==1){
        $_SESSION['user_name'] = $user_name;
        header("Location: index.php");
        die;
    }else{
        $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
    }
}

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Ma machine</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="javascript/app.js"></script>
    </head>
    <body>
        <div class="window text-center">
            <h1><img src="webfonts/DWS.png"></h1>
        </div>
        <div class="window white">
            <form method="post">
                <input type="text" id="user_name" name="user_name" placeholder="Nom d'utilisateur" required>
                <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                <input type="submit" class="blockbutton submit" value='Connexion'>
                <?php if (! empty($message)) { ?>
                    <div class="text-center"><?php echo $message; ?></div>
                <?php } ?>
            </form>
        </div>
    </body>
</html>