<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "myDB";

$conn = mysqli_connect($servername, $username, $password, $db);

if ($conn) {
	echo "Connection Success";
} else {
	die("Connection Faild " . mysqli_connect_errno());
}

#connection done 
?>