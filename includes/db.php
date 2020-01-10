<?php

$connection = mysqli_connect("localhost",'root','','doc.sql');

if(!$connection) {
	die("Unable to connect" . mysqli_error($connection));
}

?>
