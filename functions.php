<?php

function check_login($con) {

    if(isset($_SESSION['user_name'])){

        $name=$_SESSION['user_name'];
        $query = "select * from login where user_name = '$name' limit 1";
        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location: login.php");
    die;
}
?>