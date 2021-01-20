<?php

session_start();
//$q = ($_GET["q"]);
include_once 'connect.php';
$dep_airport = mysqli_real_escape_string($con, $_POST['dep_airport']);
$dep_city = mysqli_real_escape_string($con, $_POST['dep_city']);
$dep_country = mysqli_real_escape_string($con, $_POST['dep_country']);
$dep_date = mysqli_real_escape_string($con, $_POST['dep_date']);
$adult = mysqli_real_escape_string($con, $_POST['adult']);
$children = mysqli_real_escape_string($con, $_POST['children']);
$duration = mysqli_real_escape_string($con, $_POST['duration']);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//echo $_SESSION["ivnumber"];
if ( isset($_SESSION["ivnumber"]) ) {
 
    // echo $q;
    // echo '<br>'.$_SESSION["ivnumber"];
    $inv_table = $_SESSION["ivnumber"];

    include("connect.php");
    $sql = ("insert into $inv_table(product_id,product_code,procduct_name,product_image,unit_price)
SELECT product_id,product_code,procduct_name,product_image,unit_price from products where product_id = '$q';");

    //header ("Location: index.php");
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
        header("location:logout.php");
    }
    include 'show_products.php';
} else {
    include("connect.php");
    $sql2 = ("select  count(issued_date) from invoice_tb where issued_date = curdate();");
    $result = mysqli_query($con, $sql2);

    while ($row = mysqli_fetch_array($result)) {
        $record_count = $row['count(issued_date)'] +   1;
    }
    date_default_timezone_set("Africa/Accra");
    $inv_number = "book" . date("dmY"). date("hi") . $record_count;

    $_SESSION["ivnumber"] = $inv_number;
    $inv_table = $_SESSION["ivnumber"];
    $sql1 = ("
create table if not exists " . $inv_table . "
(
book_dep int primary key auto_increment,
dep_airport varchar(20),
dep_city varchar(20),
dep_country varchar(20),
dep_date date,
adult int,
children int,
duration double
)
");
    if (!mysqli_query($con, $sql1)) {
        die('Error: ' . mysqli_error($con));
        header("location:logout.php");
    }

    
   $sql2 = ("
insert into $inv_table(dep_airport,dep_city,dep_country,dep_date,adult,children,duration)
values ('$dep_airport','$dep_city','$dep_country','$dep_date','$adult','$children','$duration')
");
    if (!mysqli_query($con, $sql2)) {
        die('Error: ' . mysqli_error($con));
        header("location:logout.php");
    }  
    
    
}
