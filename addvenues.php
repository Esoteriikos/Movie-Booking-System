<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  width: 100%;
height: 100vh;
background: linear-gradient(60deg, #00cccc, #1e4d90);
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */



table {
  border: 1px solid black;
	background-color: #ffffff;
	padding: 15px;
	border-spacing: 50px 15px;
}

input[type=submit]{
	width: 50%;
	padding: 10px;
	margin: 5px 0 10px 0;
	//background: #ffffff;
	font-size: 15px;
	color: white;
	background: linear-gradient(60deg, #66ccff, #6600cc);
	border-radius: 4px;
	padding: 20px 30px;
}

input[type=submit] hover{
	background: linear-gradient(60deg, #6600cc, #66ccff);
}

/* Full-width input fields */
input[type=text],input[type=email],input[type=phone], input[type=password] {
  width: 80%;
  padding: 10px;
  margin: 5px 0 20px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  text-align: center;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}



/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="" method = "post">
  <div class="container">
    <hr>
	</br>
	
	<table align="center">
	<tr>
	<td>
    <label for="vname"><b>Venue Name</b></label>
	</td>
	<td>
    <input type="text" placeholder="Enter venue name" name="vname" required>
	</br>
	</td>
	</tr>
	
	<tr>
	<td>
    <label for="location"><b>Location</b></label>
    </td>
	<td>
	<input type="text" placeholder="Enter venue location" name="location" >
	</br>
	</td>
	</tr>
	
	<tr>
	<td>
    <label for="mcode"><b>Movie Code.</b></label>
    </td>
	<td>
	<input type="number" placeholder="Enter movie code" name="mcode" >
	</br>
	</td>
	</tr>
	
	<tr>
	<td>
    <label for="date"><b>Date</b></label>
    </td>
	<td>
	<input type="text" placeholder="dd-mm-yyyy" name="date" required>
	</br>
	</td>
	</tr>
	
	<tr>
	<td>
    <label for="timing"><b>Timing</b></label>
    </td>
	<td>
	<input type="text" placeholder="hh:mm am/pm" name="timing" required>
	</br>
	</td>
	</tr>
	
	<tr>
	<td>
    <label for="availtickets"><b>Available Tickets</b></label>
    </td>
	<td>
	<input type="number" placeholder="" name="availtickets" required>
	</br>
	</td>
	</tr>
	
	<tr>
	<td>
    <label for="price"><b>Price</b></label>
    </td>
	<td>
	<input type="number" placeholder="Enter cost" name="price" required>
	</br>
	</td>
	</tr>
	
	<tr>
	<td align = "center">
	
		<a href="admindash.php">BACK</a>

	</td>
	<td align = "center">
	
    <input type="submit" name="submitaddvenue" value="ADD" />

	</td>
	</tr>
	
	</table>

  </div>
  
</form>

</body>
</html>

<?php
if(isset($_POST['submitaddvenue'])){
    
        $vname = $_POST['vname'];
        $location = $_POST['location'];
        $mcode = $_POST['mcode'];
        $date = $_POST['date'];
		$timing = $_POST['timing'];
        $availtickets = $_POST['availtickets'];
        $price = $_POST['price'];
require_once('sconnect.php');
        
        $query = "INSERT INTO venue (vname, location ,mcode, date, timing, availtickets, price) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
		
		$result = mysqli_query($dbc, "select * from venue where vname = '$vname' && location = '$location'  && date = '$date' && timing = '$timing'");
		$row = mysqli_fetch_array($result);
		$rowcount = mysqli_num_rows($result);
		if($rowcount)
		{
			echo "<p align='center'> Venue Already Registered</p>";
		}
		else
		{
		
			$stmt = mysqli_prepare($dbc, $query);
			
			mysqli_stmt_bind_param($stmt, "ssissii", $vname, $location, $mcode, $date, $timing, $availtickets, $price);
			
			mysqli_stmt_execute($stmt);
			
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			
			if($affected_rows == 1){
				
				//echo 'venue added';
				
				mysqli_stmt_close($stmt);
				
				mysqli_close($dbc);
				header("location: addvenues.php");
			}    
			
			
			echo 'Error Occurred<br />';
			echo mysqli_error();
			
			mysqli_stmt_close($stmt);
			
			mysqli_close($dbc);
		
	
        
		} 
    
}

?>
