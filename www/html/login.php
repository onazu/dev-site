<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $query = "select * from login where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            if($user_data['password'] === $password){
                $_SESSION['user_name'] = $user_data['user_name'];
                header("Location: index.php");
                die;
            }else{
                echo "Mauvais login ou mots de passe";
            }
        }else{
            echo "Mauvais login ou mots de passe";
        }
    }
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Ma machine</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="app.js"></script>
    </head>
    <body>
        <div class="window">
            <h1>NomProjet x Bureau</h1>
        </div>
        <div class="window">
            <form method="post">
                <input type="text" id="user_name" name="user_name" placeholder="Nom d'utilisateur" required>
                <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                <input type="submit" id='submit' value='Entrer'>
            </form>
        </div>
    </body>
</html>