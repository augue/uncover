<?php
session_start();

 $inv_table = $_SESSION["ivnumber"];
include 'connect.php';

		
	$s = "INSERT INTO customer 
(bookedValue,firstname,lastname,othername,email,phone,passportNumber,dateIssued,exp_date,iss_country,gender,nationality,regDate) 
VALUES ";
	for($i=0;$i<count($_POST['firstname']);$i++)
	{
                  
		$s .="('".$inv_table."','".$_POST['firstname'][$i]."','".$_POST['lastname'][$i]."','".$_POST['middle'][$i]."','".$_POST['email'][$i]."','".$_POST['phone'][$i]."','".$_POST['passportnumber'][$i]."','".$_POST['issuedate'][$i]."','".$_POST['expirydate'][$i]."','".$_POST['issuingcountry'][$i]."','".$_POST['gender'][$i]."','".$_POST['nationality'][$i]."',curdate()),";
	}
	$s = rtrim($s,",");
	if(!mysqli_query($con,$s))
		echo mysqli_error();
	else
		
	mysqli_close($con);
        
        



?>