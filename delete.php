<?php 
include 'connect.php';
if(isset($_GET['deleteid'])){
    $uuid=$_GET['deleteid'];

    $sql="delete from `wizard_recruits` where UUID=$uuid";
    $result=mysqli_query($conn,$sql);
    if($result){
        //echo "Deleted Successfully";

        header('location:display.php');
    }else {
        die(mysqli_error($conn));
    }
}



?>