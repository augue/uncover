<?php
session_start();
 $inv_table = $_SESSION["ivnumber"];
searchdate($inv_table);
function searchdate($inv_table)
{
include './connect.php';
$result = $con->query(" select 	bookedValue,firstname,lastname,othername,gender,email,phone,passportNumber,dateIssued,exp_date,iss_country from customer where bookedValue = '$inv_table'  ");
$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

      $rows[] = $rs;
}

$con->close();
print json_encode($rows);

}


?>


 