<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	
	//==========================================
	//	CONNECT TO THE LOCAL DATABASE
	//==========================================
	$con=mysqli_connect("localhost","root","","uncover");
       // $con=mysqli_connect("localhost","id3508948_augpos","augpos","id3508948_olympic");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	