<?php

session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Devworks</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script> var user_data = <?php echo json_encode($user_data) ?>; </script>
        <script src="javascript/app.js"></script>
    </head>
    <body>
        <div class="nav">
            <div class="aide">
                <button onClick="home()" class="menubutton blockbutton simplebutton">
                    ☰
                </button>
                <div class="dropdown-content">
                    <button onClick="logout()" class="blockbutton">
                        Projet?
                    </button>
                </div>
            </div>
            <button onClick="myengine()" class="menubutton">
                Ma machine
            </button>
            <button onClick="teamengine()" class="menubutton">
                Machines de mon équipe
            </button>
            <div class="nom">
                <button onClick="home()" class="menubutton dropdown">
                    <?= $user_data['user_name'] ?>
                </button>
                <div class="dropdown-content">
                    <button onClick="logout()" class="blockbutton">
                        Déconnexion
                    </button>
                </div>
            </div>
        </div>
        <div class="window text-center">
            <h1><img src="webfonts/DWS.png"></h1>
        </div>
        <div class="window white" id="announce">
            <fieldset>
                <legend>ANNONCES</legend>
                <div id="remoteannouce">
                </div>
            </fieldset>
        </div>
        <div class="window white" id="releasenote">
            <fieldset>
                <legend>NOTES DE MISE À JOUR</legend>
                <div class="scrollbox" id="remoterelease">
                    22-10-2021: Ceci est une note de mise à jour.
                    <br><br><br>22-12-2021: Ceci est une note de mise à jour(1).
                    <br><br><br>22-13-2021: Ceci est une note de mise à jour(2).
                </div>
            </fieldset>
        </div>
        <div class="window white nodisplay" id="userinfo">
            <fieldset>
                <legend>UTILISATEUR</legend>
                <div class="flexspacearound margin-top">
                    <div>
                        HEXA :
                        <div class="inline relief">
                            <?= $user_data['user_name'] ?>
                        </div>
                    </div>
                    <div id="bureau">
                        BUREAU :
                        <div class="inline relief" id="rbureau">
                            <?= $user_data['bureau'] ?>
                        </div>
                    </div>
                    <div class="nodisplay" id="getbureau">
                        BUREAU :
                        <select id="bselect">
                            <option value="bureau1">Bureau1</option>
                            <option value="bureau2">Bureau2</option>
                            <option value="bureau3">Bureau3</option>
                        </select>
                    </div>
                    <div id="emplacement">
                        EMPLACEMENT :
                        <div class="inline relief" id="remplacement">
                            <?= $user_data['emplacement'] ?>
                        </div>
                    </div>
                    <div class="getemplacement nodisplay" id="getemplacement">
                        EMPLACEMENT :
                        <select id="eselect" onChange="getdesk()">
                            <optgroup label="BATIMENT">
                                <option value="" selected disabled hidden>BATIMENT-ETAGE</option>
                                <option value="M-02-2">M-02-2</option>
                                <option value="M-02-3">M-02-3</option>
                                <option value="M-02-4">M-02-4</option>
                            </optgroup>
                        </select>
                        <select id="ebselect">
                        </select>
                    </div>
                    <div id="prise">
                        N°PRISE :
                        <div class="inline relief" id="rprise">
                            <?= $user_data['prise'] ?>
                        </div>
                    </div>
                    <div class="nodisplay" id="getprise">
                        N°PRISE :
                        <textarea name="pinput" id="pinput"><?= $user_data['prise'] ?></textarea>
                    </div>
                </div>
                <div class="text-center margin-top" id="bmodif">
                    <button onclick="getmodif()" class= "blockbutton" >Modifier</button>
                </div>
                <div class="text-center margin-top nodisplay" id="bvalide">
                    <button onclick="setmodif()" class= "blockbutton" >Valider</button>
                </div>
            </fieldset>
        </div>
        <div class="window white nodisplay" id="systeminfo">
            <fieldset>
                <legend>INFORMATIONS SYSTÈME</legend>
                <div class="flexspacearound margin">
                    <div>
                        ADRESSE IP :
                        <div class="inline relief">
                            <?= $user_data['ip'] ?>
                        </div>
                    </div>
                    <div>
                        SYSTÈME D'EXPLOITATION :
                        <div class="inline relief">
                            <?= $user_data['os'] ?>
                        </div>
                    </div>
                    <div>
                        N° DE SÉRIE :
                        <div class="inline relief">
                            <?= $user_data['serie'] ?>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="window white nodisplay" id="state">
            <fieldset>
                <legend>ÉTAT DU SYSTÈME</legend>
                <div class="flexspacearound margin-top">
                    <div>
                        MACHINE À JOUR :
                        <div class="inline" id="uptodate">
                        </div>
                    </div>
                    <div>
                        MACHINE TRACÉE :
                        <div class="inline" id="log">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button onclick="update()" class= "blockbutton" >Mettre à jour</button>
                </div>
            </fieldset>
        </div>
        <div class="window white nodisplay" id="teaminfo">
            <fieldset>
                <legend>ÉQUIPE</legend>
                <div class="flexspacearound" id="tableteam">
                </div>
            </fieldset>
        </div>
        <div>
        </div>
        <footer>
            @PORNET Jérémie
        </footer>
    </body>
</html>