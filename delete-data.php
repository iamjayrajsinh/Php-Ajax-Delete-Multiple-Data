<?php

$student_id = $_POST['id'];

$str = implode(",",$student_id); // Convert Array into String

$conn = mysqli_connect("localhost","root","","ajax_multiple_data_delete") or die("Connection Failed");

$sql = "DELETE FROM students WHERE id IN ({$str})";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
	echo 0;
}

?>
