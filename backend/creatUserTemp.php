<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../connect_2.php';

insert_stock();
function insert_stock()
{

        $dep_airport = ($_GET["dep_airport"]);
         $dep_city = ($_GET["dep_city"]);
         $dep_date = ($_GET["dep_date"]);
        $adult = ($_GET["adult"]);
        $children = ($_GET["children"]);
        $duration = ($_GET["duration"]);
        $token = ($_GET["token"]);
          $_SESSION['userToken'] = $token;
   
   
    include '../connect_2.php';
$query = ("insert into customer(bookedValue)value('$token')");
 

     if(mysqli_query($conn, $query))
                      {
         echo'
             <div style=" text-align:center;" class="animated bounceIn" id = "stock_success">
    <img src="images/checkmark.gif" style="width:50%" ><br>
         <span class="" style="color:#77b43f;margin-buttom:50px;" >  Quantity Added successfully</span>
   </div>     
';   
      
    }
 else {
     die('Error 111: ' . mysqli_error($conn));
    
    }    
}

