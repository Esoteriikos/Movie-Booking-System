<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-image: url("loginback.jpg");
  background-size: cover;
  margin: 15% 0 0 0;
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
	width: 70%;
	padding: 5px;
	margin: 5px 0 10px 0;
	//background: #ffffff;
	font-size: 14px;
	color: white;
	background: linear-gradient(60deg, #66ccff, #6600cc);
	border-radius: 10px;
	padding: 10px 20px;
}

/* Full-width input fields */
input[type=text],input[type=email],input[type=phone], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
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

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
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

	<table align="center">
	<tr>
		<td>
			<label for="username"><b><i>Username</i></b></label>
		</td>
		<td>
			<input type="text" placeholder="Enter username" name="username" required>
			</br>
		</td>
	</tr>
	
	<tr>
		<td>
			<label for="psw"><b>Password</b></label>
		</td>
		<td>
			<input type="password" placeholder="Enter Password" name="password" required>
			</br>
		</td>
	</tr>

	<tr>
		<td align="center">
			<a href="http://localhost/register.php">Create Account</a>
		</td>
		<td align="center">
			<input type="submit" name="submit" value="Login" />
		</td>
	</tr>
   </table>
   </br>
  
	</div>
  
</form>

<?php
	session_start();

    require_once('sconnect.php');
      	  
	if(isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
	
		$result = mysqli_query($dbc, "select * from cust where username = '$username' && password = '$password'");
		$row = mysqli_fetch_array($result);
		/*$rowcount = mysqli_num_rows($result);
		if($rowcount)
		{
			echo "login successful . welcome".$row['username'];
		}
		*/
		
		if($row['active']==69)
		{	
			header("location: admindash.php");
		}
		else if($row['username']==$username && $row['password']==$password)
		{
			//echo "login successful. welcome ".$row['username'];
			mysqli_query($dbc, "UPDATE `cust` SET `active` = '1' WHERE `cust`.`cid` =".$row['cid']);
			
			header("location: dashboard.php");
			
		}
		else
		{
			//echo "failed";
			echo 'INVALID Login ID';
		}
	}

?>

</body>
</html>
