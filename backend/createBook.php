<?php
session_start();
include_once 'connect.php';
 $inv_table = $_SESSION["ivnumber"];


$room_type = mysqli_real_escape_string($con, $_POST['roomType']);
$roomNum = mysqli_real_escape_string($con, $_POST['roomNum']);
$amount = mysqli_real_escape_string($con, $_POST['amount']);
   $sql2 = ("insert into roomTypeDetails(bookingId,room_type,numberof,amount)values ('$inv_table','$room_type','$roomNum','$amount')");
    if (!mysqli_query($con, $sql2)) {
        die('Error: ' . mysqli_error($con));
        header("location:logout.php");
    }  
