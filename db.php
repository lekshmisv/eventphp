<?php
$connect=new mysqli('localhost','root','','events');
if(!$connect){
    
 die(mysqli_error($connect));
}
?>
