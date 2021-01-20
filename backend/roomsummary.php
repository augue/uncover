<?php
session_start();
 $inv_table = $_SESSION["ivnumber"];
// echo $inv_table;
searchdate($inv_table);
function searchdate($inv_table)
{
include './connect.php';
$result = $con->query(" SELECT  bookingId, room_type,sum(numberof) as sums,roomtype.amount  FROM `roomtypedetails` INNER JOIN roomtype on roomtype.typeNumber = roomtypedetails.room_type  WHERE bookingId = '$inv_table'  GROUP by room_type ");
$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

      $rows[] = $rs;
}

$con->close();
print json_encode($rows);

}


?>


 