<?php

$dbc = @mysqli_connect('localhost', 'root', '', 'cinephile')
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

?>