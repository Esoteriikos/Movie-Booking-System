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
		background: linear-gradient(60deg, #ffccff, #990000);
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

</style>


<body>
<header>
<div class="head">
	<nav>
			<div class="logo">
				<h1>MoBo</h1>

			</div>
			<div class="menu">
				<ul>
					<li><a href="dashboard.php">Home</a></li>
					<li><a href="dashboard.php">About</a></li>
					<li><a href="dashboard.php">Contact</a></li>
					<?php
					require_once('sconnect.php');
					$result = mysqli_query($dbc, "select * from cust where active = 1");
					$rowcount = mysqli_num_rows($result);
					if($rowcount)
					{
						echo '<li><a href="logout.php">log out</a></li>';
						
					}
					else echo '<li><a href="register.php">Sign up</a></li>';
					?>
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
			<hr width="70%" align = "center">
			<hr width="70%" align = "center">
		</div>
	</section>
</div>
<hr>
<section>
	<?php
	require_once('sconnect.php');
	$result = mysqli_query($dbc, "select * from movies");
					
			echo '<table align="center"
			cellspacing="60" cellpadding="30" >
			
			<tr><td align="center"><b>Movie</b></td>
			<td align="center"><b>Name</b></td>
			<td align="center"><b>Rating</b></td>
			<td align="center"><b>Genre</b></td></tr>';

			// mysqli_fetch_array will return a row of data from the query
			// until no further data is available
			while($row = mysqli_fetch_array($result)) 
			{

				echo '<tr><td align="left"><a href="booktickets.php?mcode='.$row['mcode'].'"><img src="images/'.$row['mimage'].'" width="250px" height="350px"></a></td><td align="left">' . 
				'<a href="booktickets.php?mcode='.$row['mcode'].'">'.$row['mname'] . '</a></td><td align="left">' .
				$row['rating'] . '</td><td align="left">' . 
				$row['genre'] . '</td><td align="left">';
				
				echo '</tr>';
			}

			echo '</table>';
	?>
</section>


</header>
</body>
</html>