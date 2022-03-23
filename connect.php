<?php
$conn = mysqli_connect('localhost', 'Kristopher', 'test1234', 'xsolla_wizard_recruiting');

//check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
 }
?>