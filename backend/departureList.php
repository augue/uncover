<?php
session_start();
 $inv_table = $_SESSION["ivnumber"];
// echo $inv_table;
searchdate($inv_table);
function searchdate($inv_table)
{
include './connect.php';
$result = $con->query(" select dep_airport,dep_city,dep_country,dep_date,adult,children,duration from  $inv_table   ");
$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

      $rows[] = $rs;
}

$con->close();
print json_encode($rows);

}


?>


 