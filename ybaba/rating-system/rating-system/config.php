<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rating_system";
    /* Create connection*/
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    /* Check connection*/
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $URL = 'http://localhost/rating-system/';

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>