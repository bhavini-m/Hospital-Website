<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'register'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}



$sql = 'SELECT username,data_name,data_emergency,data_ward
		FROM data
		WHERE data_Addmited="Yes"';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>
	<title>Displaying MySQL Data in HTML Table</title>
	<style type="text/css">
	
				* {
    box-sizing: border-box;
	}

		body {
		font-family: Monotype Corosiva;
		padding: 20px;
		background: #F5B7B1  ;
		font-size: 15px;
		color: #343d44;
		}

		/* Header/Blog Title */
		.header {
			padding: 40px;
			font-size: 60px;
			text-align: right;
			background: #008080 url("https://i2.wp.com/hbgmedicalassistance.com/wp-content/uploads/2015/07/fortis-hospital-logo.jpg?w=700") no-repeat local top left;
		   
		}

		/* Style the top navigation bar */
		.topnav {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: red;
			font-family: Arial, Helvetica, sans-serif;
		}

		/* Style the topnav links */
		.topnav a {
		   display: block;
			color: white;
			text-align: center;
			padding: 20px 16px;
			text-decoration: none;
			float: left;
		}

		/* Change color on hover */
		.topnav a:hover {
			background-color: #111;
		}

		/* Create two unequal columns that floats next to each other */
		/* Left column */
		.leftcolumn {   
			float: left;
			width: 75%;
		}

		/* Right column */
		.rightcolumn {
			float: left;
			width: 25%;
			background-color: #f1f1f1;
			padding-left: 20px;
		}

		/* Fake image */
		.fakeimg {
			
			width: 100%;
			
		}

		/* Add a card effect for articles */
		.card {
			 background-color: #D1F2EB;
			 padding: 20px;
			 margin-top: 20px;
			 }

		/* Clear floats after the columns */
		.row:after {
			content: "";
			display: table;
			clear: both;
		}

		/* Footer */
		.footer {
			padding: 20px;
			text-align: center;
			background: #ddd;
			margin-top: 20px;
		}

		/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
		@media (max-width: 800px) {
			.leftcolumn, .rightcolumn {   
				width: 100%;
				padding: 0;
			}
		}

		/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
		@media (max-width: 400px) {
			.topnav a {
				float: none;
				width:100%;
			}
		}
	
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
	
</head>
<body>
		<div class="header">
		<h2>APOLLO FORTIS</h2>
		</div>

		<div class="topnav">
		<a href="sHome.html">Home</a>
		<a href="sHistory.html">History</a>
		<a href="fight.php">Record</d>
		<a href="sAchievements.html">Achievements</a>
		<a href="logout.php" style="float:right">Logout</a>
		</div>
	
	<table class="data-table">
		<caption class="title"><h2>Records of Patients</h2></caption>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Emergency</th>
				<th>Ward</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while ($record = mysqli_fetch_array($query))
		{
			   echo"<tr>";
		  		  
		  echo "<td>".$record['username']."</td>";
		  echo "<td>".$record['data_name']."</td>";
		  echo "<td>".$record['data_emergency']."</td>";
		  echo "<td>".$record['data_ward']."</td>";
		  
		  
		  echo"</tr>";
		}?>
		</tbody>
		
	</table>
	     
</body>
</html>
