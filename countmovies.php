<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<?php

        require_once('sconnect.php');
		$result = mysqli_query($dbc, "select count(*) FROM movies");
$row = mysqli_fetch_array($result);

$total = $row[0];
echo "Total movies : " . $total;


?>

</body>
</html>