<?php

$host_name = "localhost";
$user_name = "id5078973_root";
$password = "123456";
$db_name = "id5078973_victory";


$db = mysqli_connect($host_name,$user_name,$password,$db_name);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>