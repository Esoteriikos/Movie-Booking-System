<?php

require_once('sconnect.php');

mysqli_query($dbc, "UPDATE `cust` SET `active` = '0' WHERE `cust`.`active` = 1");

header("location: dashboard.php");



?>