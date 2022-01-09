<?php
include("connection.php");
include("functions.php");

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data)){
    $bureau = stripslashes($data['bureau']);
    $bureau = mysqli_real_escape_string($con, $bureau);
    $emplacement = stripslashes($data['emplacement']);
    $emplacement = mysqli_real_escape_string($con, $emplacement);
    $prise = stripslashes($data['prise']);
    $prise = mysqli_real_escape_string($con, $prise);
    $user_name = $data['user_name'];
    $query = "UPDATE machine SET bureau = '$bureau', emplacement = '$emplacement', prise ='$prise' WHERE user_name = '$user_name'";
    $result = mysqli_query($con, $query);
    if ($result){
        $query = "select * from machine where user_name = '$user_name' limit 1";
        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            echo JSON_encode($user_data);
        }
    }
}