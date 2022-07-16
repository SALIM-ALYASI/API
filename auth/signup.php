<?php
 include "../connect.php";

 
 $username = filterRequest("username");
 $email = filterRequest("email");
 $password = filterRequest("password");

 $stmt = $con->prepare("INSERT INTO `data2` (`username`,`email`,`password`) VALUES (?, ?, ?);");
 $stmt->execute([$username , $email , password_hash($password, PASSWORD_BCRYPT)]) ;
$count = $stmt->rowCount();
if ($count > 0){
    echo "OK";
 
} else{
    echo  "NO"  ;
};
 
 
   
?>
 