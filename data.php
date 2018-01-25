<?php

$db=mysqli_connect('localhost','root','','mis') or die('Error connecting to MYSQL server.');

$query = "SELECT `name`,`num` FROM `count_student` where name = 'Student_Lalitpur' or name='Student_Kathmandu' or name='Student_Bhaktapur' or name='Student_Out_Of_Valley'";
$result = mysqli_query($db ,$query);
$data=array();
foreach ($result as $row) {
	# code...

	$data[]=$row;	
}


print json_encode($data);
?>

