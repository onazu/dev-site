<?php
include("connection.php");

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data)){
    $bureau = stripslashes($data['bureau']);
    $bureau = mysqli_real_escape_string($con, $bureau);
    $query = "SELECT * FROM machine WHERE bureau='$bureau'";
    $result = mysqli_query($con, $query);
    if($result && mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) {
            $user_team[] = $row;
        }
        echo JSON_encode($user_team);
    }
}