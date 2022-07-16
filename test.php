<?php
include "connect.php";
include "auth/auth_functions.php";

echo check_auth($con);
echo "##";
if(check_auth($con)){
    print("<html><h1>WELCOME USER</h1>");
} else {
    print("<html><h1>YOU ARE NOT LOGGED IN</h1>");
}


?>