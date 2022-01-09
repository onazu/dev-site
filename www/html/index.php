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
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script> var user_data = <?php echo json_encode($user_data) ?>; </script>
        <script type="text/javascript" src="javascript/app.js"></script>
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
                <button class="menubutton" onclick="teamengine()">Machines de mon équipe</button>
            </div>
            <div class="dropdown nom">
                <button  class="menubutton dropdown" onclick="myengine()"><?= $user_data['user_name'] ?></button>
                <div class="dropdown-content nom">
                    <button onclick="logout()" class= "blockbutton">Déconnexion</a>
                </div>
            </div>
        </div>
        <div class="window text-center">
            <h1><img src="webfonts/DWS.png"> x Secteur</h1>
        </div>
        <div class="window white announce" id="announce">
            <fieldset>
                <legend>ANNONCE</legend>
                <div id="remoteannouce">
                </div>
            </fieldset>
        </div>
        <div class="window white releasenote" id="releasenote">
            <fieldset>
                <legend>RELEASE NOTE</legend>
                <div class="scrollbox" id="remoterelease">
                    22-10-2021: Ceci est une note de mise à jour.
                    <br><br><br>22-12-2021: Ceci est une note de mise à jour(1).
                    <br><br><br>22-13-2021: Ceci est une note de mise à jour(2).
                </div>
        </div>
        <div class="window white userinfo nodisplay" id="userinfo">
            <fieldset>
                <legend>USER INFO</legend>
                <div class="flexspacearound margin-top">
                    <div class="inline">
                        NOM :
                        <div class="inline relief">
                            <?= $user_data['user_name'] ?>
                        </div>
                    </div>
                    <div class="inline bureau" id="bureau">
                        BUREAU :
                        <div class="inline relief" id="rbureau">
                            <?= $user_data['bureau'] ?>
                        </div>
                    </div>
                    <div class="getbureau nodisplay" id="getbureau">
                        BUREAU :
                        <select id="bselect">
                            <option value="bureau1">Bureau1</option>
                            <option value="bureau2">Bureau2</option>
                            <option value="bureau3">Bureau3</option>
                        </select>
                    </div>
                    <div class="inline emplacement" id="emplacement">
                        EMPLACEMENT :
                        <div class="inline relief" id="remplacement">
                            <?= $user_data['emplacement'] ?>
                        </div>
                    </div>
                    <div class="getemplacement nodisplay" id="getemplacement">
                        EMPLACEMENT :
                        <select id="eselect">
                                <optgroup label="BAT-1">
                                    <option value="bat1-emplacement1">Emplacement1</option>
                                    <option value="bat1-emplacement2">Emplacement2</option>
                                </optgroup>
                                <optgroup label="BAT-2">
                                    <option value="bat2-emplacement1">Emplacement1</option>
                                    <option value="bat2-emplacement2">Emplacement2</option>
                                </optgroup>
                        </select>
                    </div>
                    <div class="inline prise" id="prise">
                        N°PRISE :
                        <div class="inline relief" id="rprise">
                            <?= $user_data['prise'] ?>
                        </div>
                    </div>
                    <div class="getprise nodisplay" id="getprise">
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
        <div class="window white systeminfo nodisplay" id="systeminfo">
            <fieldset>
                <legend>SYSTEM INFO</legend>
                <div class="flexspacearound margin">
                    <div class="inline">
                        NOM MACHINE :
                        <div class="inline relief">
                            <?= $user_data['nommachine'] ?>
                        </div>
                    </div>
                    <div class="inline">
                        @IP :
                        <div class="inline relief">
                            <?= $user_data['ip'] ?>
                        </div>
                    </div>
                    <div class="inline">
                        OS :
                        <div class="inline relief">
                            <?= $user_data['os'] ?>
                        </div>
                    </div>
                    <div class="inline">
                        S/N :
                        <div class="inline relief">
                            <?= $user_data['serie'] ?>
                        </div>
                    </div>
                </div>
        </div>
        </div>
        <div class="window white state nodisplay" id="state">
            <fieldset>
                <legend>SYSTEM STATE</legend>
                <div class="flexspacearound margin-top">
                    <div class="inline">
                        MACHINE À JOUR :
                        <div class="inline" id="uptodate">
                        </div>
                    </div>
                    <div class="inline">
                        MACHINE TRACÉE :
                        <div class="inline" id="log">
                        </div>
                    </div>
                </div>
                <div class="text-center" id="bmodif">
                    <button onclick="update()" class= "blockbutton" >Mettre à jour</button>
                </div>
            </fieldset>
        </div>
        <div class="window white teaminfo nodisplay" id="teaminfo">
            <fieldset>
                <legend>TEAM INFO</legend>
                <div class="flexspacearound" id="tableteam">
                </div>
            </fieldset>
        </div>
        <div>
        </div>
        <div class="footer">
           <br>@T13
        </div>
    </body>
</html>