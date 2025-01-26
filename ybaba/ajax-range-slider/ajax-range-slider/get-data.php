<?php

 $conn = mysqli_connect("localhost","root","","testing") or die("Connection failed");

 if(isset($_POST['range1']) && isset($_POST['range2'])){
    $min = $_POST['range1'];
    $max = $_POST['range2'];

    $sql = "SELECT * FROM students WHERE age BETWEEN {$min} AND {$max}";
 }else{
    $min = '';
    $max = '';
    $sql = "SELECT * FROM students ORDER BY id asc";
 }

  $result = mysqli_query($conn,$sql) or die("Query Unsuccessful.");
  $output = '';

  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      $output .= "<tr>
                    <td align='center'>{$row["id"]}</td>
                    <td>{$row["student_name"]}</td>
                    <td align='center'>{$row["age"]}</td>
                    <td>{$row["city"]}</td>
                  </tr>";
    }

    echo $output;
  }else{
    echo "<h2>No Record Found.</h2>"; exit;
    
  }

?>
