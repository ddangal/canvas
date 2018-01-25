
<?php
	if(isset($_GET['see']))
	{
		$batch = $_GET['selbatch'];
	$db = mysqli_connect( 'localhost' , 'root' ,'', 'mis' ) ;
	
  $selectSQL = "SELECT * FROM `student` where batch=$batch";
 # Execute the SELECT Query
 $selectRes = mysqli_query( $db,$selectSQL);
 
    ?>
<html>
	<head>
		<link rel="stylesheet" href="form.css">
	</head>
<body>
	<!-- ########################################################-->
	<!-- ########################################################-->
	<!-- ########################################################-->
		<div class="simple_form">
		<form action="" method="get">

		Select the Batch:
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select	 name="selbatch">
			<option value="2013">Select Batch</option>
			<option value="2013">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
			
		</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="submit" name="see" value="submit"/>
		
		</form>
	
	</div>
	<!-- ########################################################-->
	<!-- ########################################################-->
	<!-- ########################################################-->
	<div id="left_side">
<h2><u>Data of Batch:<?php echo $batch?> students</u></h2>
<table border="2">
  <thead>
    <tr>
      <th>fname</th>
      <th>lname</th>
      <th>faculty</th>
      <th>batch</th>
      <th>tu_roll</th>
      <th>address</th>
      <th>gender</th>
    </tr>
  </thead>
  <tbody>
    <?php
	$con = mysqli_connect("localhost","root","","mis");
	$totalStudent = 0;
	$maleCount = 0;
	$femaleCount = 0;
	$studentKTM = 0;
	$studentBKT = 0;
	$studentLTP = 0;
	$studentOutside = 0;
	$batch = 0;
      if( mysqli_num_rows($selectRes)==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
			$totalStudent++;
			if($row['gender'] == 'M')
			{
				$maleCount++;
			}
			else
			{
				$femaleCount++;
			}
			if($row['address'] == "Kathmandu")
			{
				$studentKTM++;
			}
			else if($row['address'] == "Lalitpur")
			{
				$studentLTP++;
			}
			else if($row['address']=="Bhaktapur")
			{
				$studentBKT++;
			}
			else
			{
				$studentOutside++;
			}
			$batch = $row['batch'];
          echo "<tr><td>{$row['fname']}</td><td>{$row['lname']}</td><td>{$row['faculty']}</td><td>{$row['batch']}</td><td>{$row['tu_roll']}</td><td>{$row['address']}</td><td>{$row['gender']}</td></tr>\n";
        }
		$query1 = "delete from count_student";
		mysqli_query($con,$query1);
		$query = "insert into count_student values('batch',$batch),('Total_Student',$totalStudent),('Male_Student',$maleCount),('Female_Student',$femaleCount),('Student_Out_Of_Valley',$studentOutside),('Student_Kathmandu',$studentKTM),('Student_Lalitpur',$studentLTP),('Student_Bhaktapur',$studentBKT)
				";
		//$query = "insert into countstudent values($batch,$totalStudent,$maleCount,$femaleCount,$studentOutside,$studentKTM,$studentLTP,$studentBKT)";
		mysqli_query($con,$query) or die(mysqli_error($con));
      }
	  ################################################
	################################################
	################################################
    ?>
  </tbody>
</table>
	</div>
	<!-- ########################################################-->
	<!-- ########################################################-->
	<!-- ###################	#####################################-->
	<div id="right_top">
		<link rel="stylesheet" href="form.css"/>
		<script type="text/javascript" src="jquery.min.js"></script>
		<script type="text/javascript" src="app.js"></script>
		<script type="text/javascript" src="app1.js"></script>
		<script type="text/javascript" src="Chart.min.js"></script>
	<h2 class ="top_text"><u>Total Number of Students:</u> <?php
		echo $totalStudent;
	?></h2>
	<h3><u>Students From Inside Valley:</u> <?php
		echo ($studentBKT+$studentKTM+$studentLTP);
		
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<u>Students From Outside Valley:</u> <?php
		echo ($studentOutside);
		
	?>
	</h3>
	
		<canvas id="mycan"></canvas>
	
	

	</div>
	<!-- ########################################################-->
	<!-- ########################################################-->
	<!-- ########################################################-->
	<div id="right_bottom">
		
	<h3><u>Total Male Students:</u> <?php
		echo ($maleCount);
		
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<u>Total Female Students:</u> <?php
		echo ($femaleCount);
		
	?>
	</h3>
		
		<canvas id="mycan1">This is canvas</canvas>
	






	</div>
	<!-- ########################################################-->
	<!-- ########################################################-->
	<!-- ########################################################-->
	</body></html>
  
   <?php 
	}
	else
	{
?>
<html>
<head>
		<link rel="stylesheet" href="form.css">

</head>
	<body>
	<div class="simple_form">
		<form action="" method="get">

		Select the Batch:
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="selbatch">
			<option value="2013">Select Batch</option>
			<option value="2013">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
		
		</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="submit" name="see" value="submit"/>
		
		</form>
	
	</div>
	</body>
</html>
<?php
}
 ?>