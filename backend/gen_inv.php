<?php
session_start();

function insert_cart($inv)
{
    $token =  $_SESSION['orderdtoken'];
    $p_id = $_SESSION['pro_id'];
    $quantity = ($_GET["quan"]);
    $a_amount= trim($_GET['amount']);
    $store_id = $_SESSION['store_id'];
    $state = ($_GET["state"]);
    $date = trim($_GET["date"]);
    $userid = $_SESSION['user_id'];
    $price = number_format((float)($a_amount / $quantity), 2, '.', '');


    include '../../connect_2.php';

    $query = ("call take_order('$p_id','$inv','$store_id','$quantity','$a_amount','$date','$state','$token','$userid','$price')");

    $date2 = date('Y-m-d');
    $userid = $_SESSION['user_id'];
    $user = $_SESSION['user_email'];
    $usertype = $_SESSION['user_type'];
    $storeid = $_SESSION['store_id'];
    $ip = '';
    $action = 'Product sale';
    $brief = $action.' by '.$user.' on '.$date2;


    $sql4 = ("select  * from product where pro_id = '$p_id'");
    $result4 = mysqli_query($conn, $sql4);
    $row = mysqli_fetch_array($result4);
    $proname = $row['pro_name'];

    $details = 'Sale made for: '.$proname.', Quantity: '.$quantity.',Amount : '.$a_amount.' ON '.$date;

    $sql3 = $conn->query("INSERT INTO history (userid, username, user_type , store_id ,ip , action , brief , details, date) VALUES ('$userid','$user','$usertype','$storeid','$ip','$action','$brief','$details','$date2')");


    if(mysqli_query($conn, $query))
    {
        return print_r(json_encode(["success" => "Product has successfully been added"]));
    } else {
        return print_r(json_encode(["error" => "Something went wrong: " . $conn->error]));
    }

}


if(!isset($_SESSION["ivnumber"]) ){
    include '../../connect_2.php';

    $store_id = $_SESSION['store_id'];

    $sql2 = ("select  count(invoice) from invcoice_tb where store_id = '$store_id';");
    $result = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_array($result);
    $record_count = $row['count(invoice)'];

    $inv_number = "inv" . time() . $record_count;
    $sql = ("call create_inv('$store_id','$inv_number')");

    mysqli_query($conn, $sql);

    $_SESSION["ivnumber"] = $inv_number;
    insert_cart($inv_number);
}
else{
    $inv_number = $_SESSION["ivnumber"];
    insert_cart($inv_number);
}

