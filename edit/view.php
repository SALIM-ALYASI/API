<?php
 include "../connect.php";


 $email = filterRequest("email");


 $stmt = $con->prepare("SELECT id,username,email FROM data2 WHERE email=?");
 $stmt->execute([$email]) ;
$count = $stmt->rowCount();
if ($count > 0){

    // prepare data in JSON format
    $edata = $stmt->fetchAll()[0];

    $fdata = [
        "id" => $edata[0],
        "username" => $edata[1],
        "email" => $edata[2]
    ];


    echo json_encode($fdata);
 
} else{
    echo  json_encode(['status'=>'error']);

    };
 
 
   

?>