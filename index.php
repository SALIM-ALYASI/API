<?php
 
 include "connect.php";
 include "auth/auth_functions.php";
 // check if user is authenticated
 if(!check_auth($con)){
    echo "YOU ARE NOT LOGGED IN ";
    exit;
 }


 $stmt = $con->prepare("SELECT * FROM data2");
 $stmt->execute();
 $sdata = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $count = $stmt->rowCount();
 echo json_encode($sdata) ;
 
?>
<!-- execute -->