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
        <div class="header">
            <div class="dropdown aide">
                <button onclick="home()" class="menubutton">☰</button>
                <div class="dropdown-content aide">
                        <button onclick="logout()" class= "blockbutton" >Projet ?</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="menubutton" onclick="myengine()">Ma machine</button>
            </div>
            <div class="dropdown">
                <button class="menubutton" onclick="teamengine()">Machine de mon équipe</button>
            </div>
            <div class="dropdown nom">
                <button  class="menubutton dropdown" onclick="myengine()"><?= $user_data['user_name'] ?></button>
                <div class="dropdown-content nom">
                    <button onclick="logout()" class= "blockbutton">Déconnexion</a>
                </div>
            </div>
        </div>
        <div class="window text-center">
            <h1>NomProjet x Bureau</h1>
        </div>
        <div class="window white announce" id="announce">
            ANNOUNCE
        </div>
        <div class="window white releasenote" id="releasenote">
            RELEASE NOTE
        </div>
        <div class="window white userinfo nodisplay" id="userinfo">
            USER INFO
        </div>
        <div class="window white systeminfo nodisplay" id="systeminfo">
            SYSTEM INFO
        </div>
        <div class="window white state nodisplay" id="state">
            STATE
        </div>
        <div class="window white teaminfo nodisplay" id="teaminfo">
            TEAMINFO
        </div>
        <div class="footer"></div>
    </body>
</html>