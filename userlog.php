<?php
session_start();
include('connection.php');
if($_SESSION['user_name'])
{
?><!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>welcome</title>
</head>
<body bgcolor="#d6c2c2">
<p><a href="welcome.php">Welcome : <?php echo $_SESSION['user_name'];?> </a>| <a href="logout.php">Logout</a> </p>
<table align="center" border="1">
<tr>

<th>User Id</th>
<th>User Name</th>

<th>Action Performed</th>
<th>Login Time</th>
</tr>

<?php 
$username = $_SESSION['user_name'];
$query=mysqli_query($conn,"select * from userlog where username='$username'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $row['username'];?></td>
<td><?php echo $row['uip'];?></td>
<td><?php echo $row['action'];?></td>
<td><?php echo $row['log'];?></td>

</tr>
<?php $cnt=$cnt+1;
} ?>
</table>
</body>
</html>
<?php
} else{
header('location:logout.php');
}
?>