<?php
session_start();
// $inv_table = $_SESSION["ivnumber"];
//searchdate($inv_table);
//function searchdate($inv_table)
//{
include './connect.php';
$result = $con->query(" select typeNumber,amount from  roomtype ");
$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

      $rows[] = $rs;
}

$con->close();
print json_encode($rows);


?>


 