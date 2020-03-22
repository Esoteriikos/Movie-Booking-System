<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  width: 100%;
height: 100vh;
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
	//color: white;
	border-radius: 4px;
	padding: 20px 30px;
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
    <label for="number"><b>Total Tickets</b></label>
	</td>
	<td>
    <input type="number" placeholder="" name="ttickets" required>
	</br>
	</td>
	</tr>
	
	<tr>
	<td>
    <label for="text"><b>Name on Card</b></label>
    </td>
	<td>
	<input type="text" placeholder="abc" name="cardname" required >
	</br>
	</td>
	</tr>
	
	<tr>
	<td>
    <label for="number"><b>Card number</b></label>
    </td>
	<td>
	<input type="number" placeholder="xxxx-xxxx-xxxx-xxxx" name="cardno" required>
	</br>
	</td>
	</tr>
	
	<tr>
	<td>
    <label for="number"><b>cvv</b></label>
    </td>
	<td>
	<input type="number" placeholder="xxx" name="cvv" required>
	</br>
	</td>
	</tr>
	
	<tr>
		<td align = "center">
	
		<a href="dashboard.php">BACK</a>

	</td>
	<td align = "center">
	
    <input type="submit" name="submitpay" value="pay" />

	</td>
	</tr>
		
	</table>

  </div>
  
</form>

</body>
</html>

<?php
if(isset($_POST['submitpay'])){
    
		$mcode = $_GET['mcode']; 
		$vcode = $_GET['vcode']; 
		$ttick = $_GET['tick']; 
	
        $ttickets = $_POST['ttickets'];
        $cardname =$_POST['cardname'];
		$cardno = $_POST['cardno'];
        $cvv =$_POST['cvv'];

        require_once('sconnect.php');
        
        $query = "INSERT INTO payment (cardno, cardname,cvv, mcode, vcode) VALUES (?, ?, ?, ?, ?)";
        
		
	//	$result = mysqli_query($dbc, "select * from cust where username = '$username'");
	//	$row = mysqli_fetch_array($result);
	//	$rowcount = mysqli_num_rows($result);
	
	
			$stmt = mysqli_prepare($dbc, $query);
			
			mysqli_stmt_bind_param($stmt, "isiii", $cardno, $cardname, $cvv, $mcode, $vcode);
			
			mysqli_stmt_execute($stmt);
			
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			
//			$upq =  "select * from venue WHERE vid = '$vcode'";
			
//			$updatevenue = mysqli_query($dbc,$upq);
//			echo "hngncycrcrtr";
			echo $ttick ;
//		echo $updatevenue['price'];
			
		mysqli_query($dbc, "UPDATE `venue` SET `availtickets` =".$ttick-$ttickets." WHERE `vid`=".$vcode);
			if($affected_rows == 1){
				
				echo 'Account Created';
				
				mysqli_stmt_close($stmt);
				
				mysqli_close($dbc);
				header("location: dashboard.php");
			}    
			
			
			echo 'Error Occurred<br />';
			echo mysqli_error();
			
			mysqli_stmt_close($stmt);
			
			mysqli_close($dbc);
		
	
        
}

?>
