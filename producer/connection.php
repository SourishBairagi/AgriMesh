<?php 

$con=mysqli_connect("localhost","root","","dashboard");

if(mysqli_connect_errno()) {
    echo"connection error"
}
else {
    echo"connected"
}
?>