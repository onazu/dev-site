<?php
session_start();

    include("connection.php");
    include("functions.php");

     $user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Ma machine</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="app.js"></script>
    </head>
    <body>
        <div id="header">
            <div class="dropdown aide">
                <button class="menubutton">☰</button>
                <div class="dropdown-content aide">
                        <a href="logout.php" class= "blockbutton" >Projet ?</a>
                </div>
            </div>
            <button class="menubutton">Ma machine</button>
            <button class="menubutton">Machine de mon équipe</button>
            <div class="dropdown nom">
                <button  class="menubutton dropdown"><?= $user_data['user_name'] ?></button>
                <div class="dropdown-content nom">
                    <a href="logout.php" class= "blockbutton">Déconnexion</a>
                </div>
            </div>
        </div>
        <div class="window text-center">
            <h1>NomProjet x Bureau</h1>
        </div>
        <div class="window white">
            Bonjour <?= $user_data['user_name'] ?><br><br><br>
            <button class="blockbutton">Sell</button>
        </div>
    </body>
</html>