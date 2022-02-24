<?php
include 'db.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sqll="delete from details where id=$id";
    $result=mysqli_query($connect,$sqll);
    if($result){
        header('location:display.php');
        //echo "deleted";
    }
    else
    {
        die(mysqli_error($connect));
    }
}