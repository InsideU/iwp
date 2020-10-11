<?php
session_start();

include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<form action=" " method="POST">
		Username: <input type="text" name="username" value=""><br><br>
		Password: <input type="password" name="password" value=""><br><br>

		<input type="submit" name="submit" value="Log In">
	</form>

</body>

</html>

<?php
	if(isset($_POST['submit'])){
		$user = $_POST['username'];
		$pass = $_POST["password"];
		
		
		$sql = "SELECT * FROM admin WHERE username='$user' and passcode='$pass'";

		$result = mysqli_query($conn,$sql);

		if (!$result) {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}

		$count = mysqli_num_rows($result);

		if($count == 1){
			$_SESSION['user_name'] = $user;
			$uip=$_SERVER['REMOTE_ADDR']; 
			$action="Login";
			
			$sql = "INSERT INTO userlog(username,uip,action) VALUES('$user','$uip','$action')";
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
				header('location:home.php');
			  } 
			  else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			  }
			
			exit();
		}
		else echo "Login Failed not a valid user";
	}
?>