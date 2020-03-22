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

<form action="http://localhost/register.php" method = "post">
  <div class="container">
    <hr>
	</br>
	
	<table align="center">
	<tr>
	<td>
    <label for="text"><b>Username</b></label>
	</td>
	<td>
    <input type="text" placeholder="Enter Username" name="username" required>
	</br>
	</td>
	</tr>
	
	<tr>
	<td>
    <label for="phone"><b>Phone no.</b></label>
    </td>
	<td>
	<input type="phone" placeholder="Enter phone no." name="phone" >
	</br>
	</td>
	</tr>
	
	<tr>
	<td>
    <label for="email"><b>Email :- </b></label>
    </td>
	<td>
	<input type="email" placeholder="Enter email" name="email" required>
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
	<td colspan = "2" align = "center">
	
    <input type="submit" name="submitregister" value="Register" />

	</td>
	</tr>
	
	<tr>
	<td colspan = "2" align = "left">
	
		<hr>
		<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

	</td>
	</tr>
		
	</table>

  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="http://localhost/login.php">Login</a>.</p>
  </div>
</form>

</body>
</html>

<?php
if(isset($_POST['submitregister'])){
    
    
        // Trim white space from the name and store the name
        $username = trim($_POST['username']);

        // Trim white space from the name and store the name
        $phone = trim($_POST['phone']);

        // Trim white space from the name and store the name
        $email = trim($_POST['email']);

        // Trim white space from the name and store the name
        $password = trim($_POST['password']);
 
        require_once('sconnect.php');
        
        $query = "INSERT INTO cust (username, password,phone, email, active) VALUES (?, ?, ?, ?, 0)";
        
		
		$result = mysqli_query($dbc, "select * from cust where username = '$username'");
		$row = mysqli_fetch_array($result);
		$rowcount = mysqli_num_rows($result);
		if($rowcount)
		{
			echo "<p align='center'>Account Already Registered</p>";
		}
		else
		{
		
			$stmt = mysqli_prepare($dbc, $query);
			
			mysqli_stmt_bind_param($stmt, "ssis", $username, $password, $phone, $email);
			
			mysqli_stmt_execute($stmt);
			
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			
			if($affected_rows == 1){
				
				echo 'Account Created';
				
				mysqli_stmt_close($stmt);
				
				mysqli_close($dbc);
				header("location: login.php");
			}    
			
			
			echo 'Error Occurred<br />';
			echo mysqli_error();
			
			mysqli_stmt_close($stmt);
			
			mysqli_close($dbc);
		
	
        
		} 
    
}

?>
