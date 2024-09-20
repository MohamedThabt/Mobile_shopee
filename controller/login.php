<?php

session_start();








//session that store if user is admin or not 

if ($user_id >= 1 && $user_id <= 3) {
    $admins = [$user_name]; 
    $_SESSION['admin'] = true;
}else{
    $_SESSION['admin'] = false;
}