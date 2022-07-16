<?php
 include "../connect.php";
 include "auth_functions.php";
 
 // BEGIN: DEFINE MAIN FUNCTIONS SECTION

 function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

 function createNewToken($ccon, $userId){

    // generate a random token
    $token = generateRandomString(30);


    $stmt = $ccon->prepare("INSERT INTO auth_tokens ( user_id, token ) VALUES (?, ?);");
    $stmt->execute([$userId, $token]);
    $count = $stmt->rowCount();
    if ($count > 0){
        return json_encode([
            "status"=>"success",
            "token"=>$token
        ]);
    }
    }

// END: DEFINE MAIN FUNCTIONS SECTION


 $email = filterRequest("email");
 $password = filterRequest("password");


 $stmt = $con->prepare("SELECT id,username,email,password FROM data2 WHERE email=?");
 $stmt->execute([$email]) ;
$count = $stmt->rowCount();
if ($count > 0){
    // found a user with this email , checking password
    $auth_user = $stmt->fetchAll()[0];

    if(password_verify($password, $auth_user[3])){

        echo createNewToken($con, $auth_user[0]);

    } else {
        echo json_encode([
            "status"=>"error",
            "message"=>"wrong password"
        ]);
    }
 
} else{
    // no user with this email exists
    echo  json_encode([
        "status"=>"error",
        "message"=>"no user with this email exists"
    ])  ;
};
 
 
   
?>
 