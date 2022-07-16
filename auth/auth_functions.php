<?php

function check_auth($con){
    $token = filterRequest("token");

    $stmt = $con->prepare("SELECT id, user_id, token FROM auth_tokens WHERE token=:token");
    $stmt->execute([
        ":token"=>$token
    ]);
    $count = $stmt->rowCount();
    if ($count > 0){
        return true;
    } else {
        return false;
    }
}


?>