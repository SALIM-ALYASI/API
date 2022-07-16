<?php
 include "../connect.php";

 $email = filterRequest("id");


 $stmt = $con->prepare("DELETE FROM data2 WHERE id=?");
 $stmt->execute([$email]) ;
$count = $stmt->rowCount();
if ($count > 0){
    echo "OK";
 
} else{
    echo  "NO"  ;
};
 
 
   
?>
 