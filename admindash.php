<html>
<head>
	<title></title>
</head>
<link href="https://fonts.googleapis.com/css?family=Cinzel&display=swap" rel="stylesheet">
<style>
	
* {
  box-sizing: border-box;
font-family: 'Cinzel', serif;
}


.head{
		width: 100%;
		height: 100vh;
		background: linear-gradient(60deg, #D2FFE4, #00A444);
		clip-path: polygon(4% 5%, 100% 0%,95% 80%, 0% 95%);
		padding:12px;
	}
	
nav{
	width: 100%;
	height: 100px;
	//background: linear-gradient(60deg, #ffccff, #990000);
	padding-top: 20px;
	display: flex;
	color: white;
}

.logo{
		width: 50%;
		height: 4	0px;
}

.logo h1{
	line-height: 0px;
	padding-left: 50px;
	font-size: 50px;

}

.menu{
	width: 50%;
	height: 100px;
}

.menu ul{
	width: 100%;
	height: 50px;
	display: flex;
	flex-direction: row;
	justify-content:space-around;
	align-items: "center";
}

.menu ul li{
	list-style: none;
	font-size:15px;
	//font-weight: bold;
	text-transform: uppercase;
}

section{
	display: flex;
}

.leftside{
	width: 50%;
	height: auto;
	overflow: hidden; 
	margin-top: 100px;
	padding-left: 50px;
}

.leftside img{
	width: 500px;
	height: 400px;
}

.rightside{
	width: 50%;
	height: 100px;
	color: white;
	text-align: "center";
	margin-top: 10px;
	padding: 0px;
}

.rightside h1{
		font-size: 100px;
		font-weight: 100;
		padding-left: 150px;
}

.rightside p{
	font-size: 1.1rem;
	padding: 0 0;
	padding-left: 160px;
	align: "left"; 
}

.menu a {
  color: white;
  
}

table {
  border: 1px solid black;
	background-color: #ffffff;
	padding: 15px;
	border-spacing: 50px 15px;
	align: "center";
}

button{
	width: 100%;
	padding: 5px;
	margin: 5px 0 10px 0;
	//background: #ffffff;
	font-size: 14px;
	color: white;
	
	background: linear-gradient(60deg, #66ccff, #6600cc);
	border-radius: 100px;
	padding: 10px 20px;
}

.container{
	background: linear-gradient(90deg, #ffffff, #62E2FF);
}

</style>

<body>

<div class="head">
	<nav>
			<div class="logo">
				<h1>MoBo</h1>

			</div>
			<div class="menu">
				<ul>
					<li>ADMINO MODE ACTIVATED</li>  
					<li><a href="logout.php">log out</a></li>
				</ul>
			</div>
	</nav>
	
	<section>
		<div class="leftside">
			<img src="images/dash.jpg">
		</div>
		<div class="rightside">
			<h1>MoBo</h1>
			<p>Movie Booking Made Easier</p>
			<p>WELCOME ADMIN</p>
			<hr width="70%" align = "center">
			<hr width="70%" align = "center">
		</div>
	</section>
</div>
<hr>

<form action="" method = "post">
	<div class="container">

	<table align="center" cellspacing="60" cellpadding="30" >
	<tr>
		<td>
			<label for="count_movies"><b><i>Number of movies</i></b></label>
		</td>
		<td>
			<button type="submit"   formaction="/countmovies.php">Count</button>
		</td>
	</tr>
	
	<tr>
		<td>
			<label for="showmovies"><b><i>Show movies</i></b></label>
		</td>
		<td>
			<button type="submit"   formaction="/showmovies.php">Show</button>
		</td>
	</tr>
	
	<tr>
		<td>
			<label for="addm"><b>Add Movies</b></label>
		</td>
		<td>
			<button type="submit"   formaction="/addmovies.php">Add</button>
		</td>
	</tr>

	<tr>
		<td >
			<label for="deletem"><b>Delete Movies</b></label>
		</td>
		<td >
			<button type="submit"   formaction="/deletemovies.php">Delete</button>
		</td>
	</tr>
	
	<tr>
		<td>
			<label for="ShowAccount"><b>Show Accounts</b></label>
		</td>
		<td>
			<button type="submit"   formaction="/showaccounts.php">Show</button>
		</td>
	</tr>

	<tr>
		<td >
			<label for="deleteaccounts"><b>Delete Accounts</b></label>
		</td>
		<td >
			<button type="submit"   formaction="/deleteaccounts.php">Delete</button>
		</td>
	</tr>
	
	
	<tr>
		<td>
			<label for="showvenue"><b><i>Show Venues</i></b></label>
		</td>
		<td>
			<button type="submit"   formaction="/showvenues.php">Show</button>
		</td>
	</tr>
	
	<tr>
		<td>
			<label for="Addvenue"><b><i>Add Venues</i></b></label>
		</td>
		<td>
			<button type="submit"   formaction="/addvenues.php">Add</button>
		</td>
	</tr>
	
	<tr>
		<td>
			<label for="deletevenue"><b><i>Delete Venue</i></b></label>
		</td>
		<td>
			<button type="submit" formaction="/deletevenues.php">Delete</button>
		</td>
	</tr>

	<tr>
		<td>
			<label for="bookedstatus"><b><i>Booking status</i></b></label>
		</td>
		<td>
			<button type="submit"   formaction="/status.php">Status</button>
		</td>
	</tr>
	
	</table>
	</br>
  
	</div>
  
</form>


</body>
</html>



