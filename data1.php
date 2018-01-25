<?php

$db=mysqli_connect('localhost','root','','mis') or die('Error connecting to MYSQL server.');

$query = "SELECT `name`,`num` FROM `count_student` where name = 'Male_Student' or name='Female_Student'";
$result = mysqli_query($db ,$query);
$data=array();
foreach ($result as $row) {
	# code...

	$data[]=$row;	
}


print json_encode($data);
?>

