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
		<td><a href="addmovies.php">ADD Movies</a></td>
		<td><a href="deletemovies.php">Delete Movies</a></td>
	</tr>
</table>

</body>
</html>
<?php
	require_once('sconnect.php');
	
	$result = mysqli_query($dbc, "select * from movies");
						
	echo '<table align="center"
	cellspacing="30" cellpadding="15" >
	
	<tr><td align="center"><b>Movie</b></td>
	<td align="center"><b>Name</b></td>
	<td align="center"><b>Rating</b></td>
	<td align="center"><b>Genre</b></td></tr>';

	// mysqli_fetch_array will return a row of data from the query
	// until no further data is available
	while($row = mysqli_fetch_array($result))
	{

		echo '<tr><td align="left"><a href="bookticket.php"><img src="images/'.$row['mimage'].'" width="150px" height="200px"></a></td><td align="left">' . 
		$row['mname'] . '</a></td><td align="left">' .
		$row['rating'] . '</td><td align="left">' . 
		$row['genre'] . '</td><td align="left">';
		
		echo '</tr>';
	}

	echo '</table>';

	?>