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
<div class="container" style="background-color: #fff; padding: 0px; width: 94%;">
<a href="welcome.php" class="btn btn-danger btn-lg">Go Back</a>
<a href="logout.php" class="btn btn-danger pull-right">Logout</a>
<h1 align="center" style="font-size:50px">Welcome <strong style="color:red;"><?php echo"$username" ;?></strong></h1><br>
    
<div class="col-lg-4" style="margin-top:70px">
</div>
  <div class="col-lg-8" style="margin-bottom:50px">
 <h1 align="center">Group Chat</h1>
		<div id="chat_box">
		<div id="chat"></div>
        <table class="table table-bordered table-hover">
        <?php 		

$result=mysqli_query($connection,"select name,msg from chat ORDER BY date DESC Limit 0,11 ") or die ("Query 4 is inncorrect........");
while(list($name,$msg)= mysqli_fetch_array($result))
{
		
	echo "
	<tr>
	<td><span style='color:green;'>$name</span> :
	<span style='color:brown;'>$msg</span></td>
					</tr>		
";
		}
		
		$user_id=$_SESSION['user_id'];
$query=mysqli_query($connection,"select user_name from user_login where user_id='$user_id'")or die ("query 5 incorrect.......");
list($username)=mysqli_fetch_array($query);
		?></table>
		<div class="col-lg-8">
        
		<form method="post" action="welcome.php">
<input hidden="" class="input-lg" type="text" name="name" value="
<?php 
$user_id=$_SESSION['user_id'];
$query=mysqli_query($connection,"select user_name from user_login where user_id='$user_id'")or die ("query 6 incorrect.......");
list($username)=mysqli_fetch_array($query);
echo "$username";

 ?>"> 
		<textarea class="input-lg" name="msg" placeholder="enter message" required></textarea>
<input class="btn btn-primary" type="submit" name="btn_save" id="btn_save" value="Send">
		</form>
        </div>
</body>
</html>