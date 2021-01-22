<?php
session_start();
$_SESSION["mailer"] = $_POST["type"];
 echo $_SESSION["mailer"]; 
         
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= 'From: info@uncoverghana.org'."\r\n";
// $headers.="cc:jareel11addo@gmai.com";
$to = "augustineeffahdanso@gmail.com";
$subject = "testing";
$message = $_SESSION["mailer"]; 


mail($to, $subject, $message,$headers);
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<style>
    
    table{
        
        border: 1px solid #000;
        width: 400px;
    }
    </style>