<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	 $sql1 = "SELECT * FROM `employee` where id = '$id'";
	 $result1 = mysqli_query($conn, $sql1);
	 $employeen = mysqli_fetch_array($result1);
	 $empName = ($employeen['firstName']);
	 $sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
	 $sql2 = "Select * From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
?>
<html>
<head>
	<title>Employee Panel | Employee Management System</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
</head>
<body>
	<header>
		<nav>
			<h1>Employee Management System</h1>
			<ul id="navli">
				<li><a class="homered" href="eloginwel.php?id=<?php echo $id?>">HOME</a></li>
				<li><a class="homeblack" href="empproject.php?id=<?php echo $id?>">My Projects</a></li>
				<li><a class="homeblack" href="applyleave.php?id=<?php echo $id?>">Apply Leave</a></li>
				<li><a class="homeblack" href="elogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	<div class="divider"></div>
	<div id="divimg">
	<div>
		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Leave Satus</h2>
    	<table>
			<tr>
				<th style="align:center">Name</th>
				<th style="align:center">Start Date</th>
				<th style="align:center">End Date</th>
				<th style="align:center">Total Days</th>
				<th style="align:center">Reason</th>
				<th style="align:center">Status</th>
			</tr>
			<?php
				while ($employee = mysqli_fetch_assoc($result2)) {
					$date1 = new DateTime($employee['start']);
					$date2 = new DateTime($employee['end']);
					$interval = $date1->diff($date2);
					$interval = $date1->diff($date2);
					echo "<tr>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$employee['reason']."</td>";
					echo "<td>".$employee['status']."</td>";	
				}
			?>
		</table>




   
<br>
<br>
<br>
<br>
<br>


	</div>

		</h2>	
	</div>
</body>
</html>