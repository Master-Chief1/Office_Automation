<?php
include("check_session.php");
include("connection.php");
$user_id=$_SESSION['user_id'];

$query=mysqli_query($connection,"select user_name from user_login where user_id='$user_id'")or die ("query 1 incorrect.......");
list($username)=mysqli_fetch_array($query);

if(isset($_POST['btn_save'])){ 
		$name = $_POST['name'];
		$msg = $_POST['msg'];
mysqli_query($connection,"insert into chat(name,msg) values ('$name','$msg')")or die ("Query 2 is inncorrect........");			
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Dashboard For <?php echo "$username";?></title>
      <link rel="stylesheet" href="css/styles.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="boostrap/css/bootstrap.css">
    </head>
	 <body onload="ajax();"><br>
<div class="container bg-light" style="background-color: #fff; padding: 0px; width: 94%;">

<a href="logout.php" class="btn btn-danger pull-right">Logout</a>
<h1 align="center" style="font-size:50px">Welcome <strong style="color:red;"><?php echo"$username" ;?></strong></h1><br>
 
<div class="col text-center">
<br>	
<p>
<a href="private.php" class="btn btn-primary btn-lg">Private Chatroom</a> <br> <br>
<a href="groupChat.php" class="btn btn-primary btn-lg">Group Chatroom</a>
</p>
</div>
</div>
</body>
</html>