<?php
 include "../connect.php";

 $id = filterRequest("id");
 $username = filterRequest("username");
 $email = filterRequest("email");
 $password = filterRequest("password");


 $stmt = $con->prepare("UPDATE data2 SET username=?, email=?, password=? WHERE id=?");
 $stmt->execute([$username , $email , password_hash($password, PASSWORD_BCRYPT) , $id ]) ;
$count = $stmt->rowCount();
if ($count > 0){
    echo "OK";
 
} else{
    echo  "NO"  ;
};
 
 
   
?>
<!-- SELECT `id`, `username`, `email`, `password` FROM `user` WHERE 1 -->