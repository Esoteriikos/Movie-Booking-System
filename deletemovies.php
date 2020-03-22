<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  width: 100%;
height: 100vh;
		background: linear-gradient(60deg, #ffffff, #00A444);
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
	width: 100%;
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
  font-size: 22px;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="" method = "post" enctype="multipart/form-data">
  <div class="container">
    <hr>
	</br>
	
	<table align="center">
	
	<tr>
	<td>
    <label for="number"><b>Movie CODE</b></label>
	</td>
	<td>
    <input type="number" placeholder="Enter Movie code" name="mcode" required>
	</br>
	</td>
	</tr>
	
	<tr>
	<td align = "center">
	
		<a href="admindash.php">BACK</a>

	</td>
	<td align = "center">
	
		<input type="submit" name="submitdeletemovies" value="DELETE" />

	</td>
	</tr>

	</table>

  </div>
</form>

</body>
</html>

<?php
if(isset($_POST['submitdeletemovies'])){
   

        $mcode = $_POST['mcode'];

       
        require_once('sconnect.php');
		
		$result = mysqli_query($dbc, "select mid from movies where mcode = '$mcode'");
		$row = mysqli_fetch_array($result);
		$rowcount = mysqli_num_rows($result);
		if($rowcount)
		{
			echo "<p align='center'>DELETED</p>";
		
			mysqli_query($dbc, "DELETE FROM movies WHERE movies.mcode ='$mcode'");
			header("location: deletemovies.php");
     
		}
		else echo "<p align='center'>No Such Movie Exist</p>";

}
?>
