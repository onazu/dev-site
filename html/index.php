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
                <button onclick="home()" class="menubutton blockbutton simplebutton">☰</button>
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
            <fieldset>
                <legend>ANNONCE</legend>
                <div>
                    Ceci est une annonce.
                </div>
            </fieldset>
        </div>
        <div class="window white releasenote" id="releasenote">
            <fieldset>
                <legend>RELEASE NOTE</legend>
                <div>
                    22-10-2021: Ceci est une note de mise à jour.
                </div>
        </div>
        <div class="window white userinfo nodisplay" id="userinfo">
            <fieldset>
                <legend>USER INFO</legend>
                <div>
                    <div class="flexspacearound">
                        <div class="inline">
                            NOM:
                        </div>
                        <div class="inline">
                            BUREAU:
                        </div>
                        <div class="inline">
                            EMPLACEMENT:
                        </div>
                        <div class="inline">
                            N°PRISE:
                        </div>
                    </div>
                </div>
        </div>
        <div class="window white systeminfo nodisplay" id="systeminfo">
            <fieldset>
                <legend>SYSTEM INFO</legend>
                <div>
                    Ceci donne les infos systèmes.
                </div>
        </div>
        </div>
        <div class="window white state nodisplay" id="state">
            <fieldset>
                <legend>SYSTEM STATE</legend>
                <div>
                    Ceci donne l'état du systèmes.
                </div>
        </div>
        <div class="window white teaminfo nodisplay" id="teaminfo">
            <fieldset>
                <legend>TEAM INFO</legend>
                <div>
                    Ceci donne les infos de la team.
                </div>
        </div>
        <div>
        </div>
        <div class="footer">
           <br>@T13
        </div>
    </body>
</html>