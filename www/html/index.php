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
            <button class="menubutton">☰</button>
            <button class="menubutton">Ma machine</button>
            <button class="menubutton">Machine de mon équipe</button>
            <button onclick="window.location.href='logout.php'" class="menubutton">Déconnexion</button>
            <button class="menubutton">?</button>
        </div>
        <div class="window">
            <h1>NomProjet x Bureau</h1>
        </div>
        <div class="window">
            Bonjour <?php echo $user_data['user_name']; ?>
        </div>
    </body>
</html>