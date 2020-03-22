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
		<td colspan='2'><a href="admindash.php">BACK</a></td>
		<td><a href="addvenues.php">ADD venues</a></td>
		<td><a href="deletevenues.php">Delete venues</a></td>
	</tr>
</table>

</body>
</html>
<?php
	require_once('sconnect.php');
	
	$result = mysqli_query($dbc, "select * from venue");
					
	echo '<table align="center"
	cellspacing="20" cellpadding="10" >
	
	<tr>
	<td align="center"><b>CODE</b></td>
	<td align="center"><b>Movie</b></td>
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
					
	


		echo '<tr><td align="left">'.$row['vid'] . '</td>';
		
		$ress = mysqli_fetch_array(mysqli_query($dbc, "Select mname from movies where mcode=".$row['mcode']));
			
		echo '<td align="left">'.$ress['mname']. '</td>' ;
	
		
		echo '<td align="left">'.$row['vname'] . '</td><td align="left">' .
		$row['location'] . '</td><td align="left">' . 
		$row['date'] . '</td><td align="left">' .
		$row['timing'] . '</td><td align="left">' .
		$row['availtickets'] . '</td><td align="left">' .
		$row['price'] . '</td><td align="left">';
	
		echo '</tr>';
	}

	echo '</table>';

	?>