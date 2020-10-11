<?php
session_start();
include('connection.php');
// Getting logout time in db
$user=$_SESSION['user_name']; // hold the user name in session
$uip=$_SERVER['REMOTE_ADDR']; // get the user ip
$action="Logout";
// query for inser user log in to data base
$query=mysqli_query($conn,"INSERT INTO userlog(username,uip,action) VALUES('$user','$uip','$action')");
if($query){
session_unset();
//session_destroy();
}
$_SESSION['msg']="You have logged out successfully..!";
?>
<script language="javascript">
document.location="login.php";
</script>