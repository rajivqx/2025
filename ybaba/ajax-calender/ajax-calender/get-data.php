<?php
  $conn = mysqli_connect("localhost","root","","testing") or die("Connection failed");

  if(isset($_POST['date1']) && isset($_POST['date2'])){
    $min = $_POST['date1'];
    $max = $_POST['date2'];
    $sql = "SELECT * FROM students WHERE dob BETWEEN '{$min}' AND '{$max}'";
  }else{
    $sql = "SELECT * FROM students ORDER BY id asc";
  }

  $result = mysqli_query($conn,$sql) or die("Query Unsuccessful.");
  $output = "";

  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      $dob = date('d M, Y',strtotime($row['dob']));
      $output .= "<tr>
                    <td align='center'>{$row['id']}</td>
                    <td>{$row['student_name']}</td>
                    <td>{$row['city']}</td>
                    <td>{$dob}</td>
                  </tr>";
    }
    echo $output;
  }else{
    echo "<h2>No Record Found.</h2>";
  }

?>
