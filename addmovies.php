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
	<td>
    <label for="text"><b>Movie Name</b></label>
	</td>
	<td>
    <input type="text" placeholder="Enter Movie Name" name="mname" required>
	</br>
	</td>
	</tr>
	
	<tr>
	<td>
    <label for="text"><b>Rating</b></label>
    </td>
	<td>
	<input type="text" placeholder="Enter Rating /5" name="rating" >
	</br>
	</td>
	</tr>
	
	<tr>
	<td>
    <label for="text"><b>Genre</b></label>
    </td>
	<td>
	<input type="text" placeholder="Enter Genre" name="genre" required>
	</br>
	</td>
	</tr>
	
	<tr>
	<td>
    <label for="image">Select Movie Image</label>
    </td>
	<td>
	<input id="image" name="image" type="file" required>
	</br>
	</td>
	</tr>
	<tr>
	<td align = "center">
	
		<a href="admindash.php">BACK</a>

	</td>
	<td align = "center">
	
		<input type="submit" name="submitaddmovies" value="ADD" />

	</td>
	</tr>

	</table>

  </div>
</form>

</body>
</html>

<?php
if(isset($_POST['submitaddmovies'])){
   

        $mcode = $_POST['mcode'];

        // Trim white space from the name and store the name
        $mname = trim($_POST['mname']);

        // Trim white space from the name and store the name
        $rating = $_POST['rating'];

        // Trim white space from the name and store the name
        $genre = trim($_POST['genre']);
 
 
        require_once('sconnect.php');
        
        $query = "INSERT INTO movies (mcode, mname, rating,genre) VALUES (?, ?, ?, ?)";
        
		
		$result = mysqli_query($dbc, "select * from movies where mcode = '$mcode'");
		$row = mysqli_fetch_array($result);
		$rowcount = mysqli_num_rows($result);
		if($rowcount)
		{
			echo "<p align='center'>Movie Already Registered</p>";
		}
		else
		{
		
			$stmt = mysqli_prepare($dbc, $query);
			
			mysqli_stmt_bind_param($stmt, "isis",$mcode, $mname, $rating, $genre);
			
			mysqli_stmt_execute($stmt);
			
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			
			if($affected_rows == 1){
				
				echo 'Movie Added';
				
			//	mysqli_stmt_close($stmt);
				
				//mysqli_close($dbc);
				//header("location: addmovies.php");
				}    
			if(isset($_FILES['image']))
			{
			$errors= array();
			$file_name = $_FILES['image']['name'];
			$file_size =$_FILES['image']['size'];
			$file_tmp =$_FILES['image']['tmp_name'];
			$file_type=$_FILES['image']['type'];
			$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
			  
			$extensions= array("jpeg","jpg","png");
			  
			  if(in_array($file_ext,$extensions)=== false){
				 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
			  }
			  
			  if($file_size > 2097152){
				 $errors[]='File size must be excatly 2 MB';
			  }
			  
			  if(empty($errors)==true)
			  {
				  $row = mysqli_fetch_array(mysqli_query($dbc, "select mid from movies where mcode = '$mcode'"));
				 move_uploaded_file($file_tmp,"images/".$row['mid'].'.jpg');
				 mysqli_query($dbc, "UPDATE movies SET mimage ='".$row['mid'].".jpg' WHERE movies.mid =".$row['mid']);
			//	 echo "Success";
			  }else{
				 print_r($errors);
			 }
			}	

			
		//	echo 'Error Occurred<br />';

			
			mysqli_stmt_close($stmt);
			
			mysqli_close($dbc);
		
			header("location: addmovies.php");
     
		}

}
?>
