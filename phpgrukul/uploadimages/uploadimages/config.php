<?php

define('DB_SERVER','localhost');

define('DB_USER','phpguruk_dmuser');

define('DB_PASS' ,'Idea8353#');

define('DB_NAME', 'phpguruk_contactformproject');

$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection

if (mysqli_connect_errno())

{

 echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

?>