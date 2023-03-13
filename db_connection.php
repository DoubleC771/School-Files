<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "logintest";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 #dadndndndn
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>