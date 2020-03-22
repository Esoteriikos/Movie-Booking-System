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
		<td><a href="deleteaccounts.php">DELETE ACCOUNTS</a></td>
	</tr>
</table>

</body>
</html>
<?php
	require_once('sconnect.php');
	
	$result = mysqli_query($dbc, "select * from cust");
						
	echo '<table align="center"
	cellspacing="30" cellpadding="15" >
	
	<tr><td align="center"><b>Username</b></td>
	<td align="center"><b>Password</b></td>
	<td align="center"><b>Email</b></td>
	<td align="center"><b>Phone no.</b></td></tr>';

	// mysqli_fetch_array will return a row of data from the query
	// until no further data is available
	while($row = mysqli_fetch_array($result))
	{

		echo '<tr><td align="left">'.
		$row['username'].'</td><td align="left">' . 
		$row['password'] . '</td><td align="left">' .
		$row['email'] . '</td><td align="left">' . 
		$row['phone'] . '</td><td align="left">';
		
		echo '</tr>';
	}

	echo '</table>';

	?>