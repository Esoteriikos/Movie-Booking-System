<html>

<style>
table{ border: 1px solid black;
font-size:20px;
background: #feeeee	;
}

.head{
	background: #ffeeee;
}
</style>

<body>

<table align="center" cellspacing="10" cellpadding="30" class="head">
	<tr>
		<td colspan='2'><a href="dashboard.php">BACK</a></td>
		<td><a href="dashboard.php">Select Movie</a></td>
	</tr>
</table>

<?php
	require_once('sconnect.php');
	$mcode = $_GET['mcode']; // output 2489
//echo  $_GET['mcode'];
	$result = mysqli_query($dbc, "select * from venue where mcode = ".$mcode);
				
//$dbc, "SELECT * FROM venue  INNER JOIN movies ON movies.mcode = venue.".$mcode
				
	echo '<table align="center"
	cellspacing="20" cellpadding="10" >
	
	<tr>
	<td align="center"><b>venue name</b></td>
	<td align="center"><b>Location</b></td>
	<td align="center"><b>date</b></td>
	<td align="center"><b>timing</b></td>
	<td align="center"><b>Available Tickets</b></td>
	<td align="center"><b>Price</b></td></tr>';

	// mysqli_fetch_array will return a row of data from the query
	// until no further data is available
	while($row = mysqli_fetch_array($result) )
	{
		echo '<tr>';
		
		$ress = mysqli_fetch_array(mysqli_query($dbc, "Select mname from movies where mcode=".$row['mcode']));
		
		echo '<td align="left"><a href="payment.php?mcode='.$row['mcode'].'&vcode='.$row['vid'].'&tick='.$row['availtickets'].'">'.$row['vname'] . '</a></td><td align="left">' .
		$row['location'] . '</td><td align="left">' . 
		$row['date'] . '</td><td align="left">' .
		$row['timing'] . '</td><td align="left">' .
		$row['availtickets'] . '</td><td align="left">' .
		$row['price'] . '</td><td align="left">';
	
		echo '</tr>';
	}
	echo '</table>';


	?>


   

</body>
</html>
