<?php

$conn = mysqli_connect("localhost","root","","ajax_multiple_data_delete") or die("Connection Failed");

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

$output = "";
if(mysqli_num_rows($result) > 0 ){
  $output .= "<table border='0' width='100%' cellpadding='10px' cellspacing='2'>
              <tr>
                <th width='30px'></th>
                <th width='60px'>Id</th>
                <th>Name</th>
                <th width='90px'>Age</th>
                <th width='90px'>City</th>
              </tr>";     
  while($row = mysqli_fetch_assoc($result)){
    $output .= "<tr>
                <td align='center'><input type='checkbox' value='{$row['id']}'></td>
                <td align='center'>{$row['id']}</td>
                <td align='center'>{$row['student_name']}</td>
                <td align='center'>{$row['age']}</td>
                <td align='center'>{$row['city']}</td>
              </tr>";
  } 
  $output .= "</table>";

  echo $output;                      
}else{
  echo "<h2>No Record Found.</h2>";
}

?>
