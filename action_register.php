<?php
include("includes/header.php");

if(isset($_POST['realname']) && !empty($_POST['realname']) && isset($_POST['username']) &&
  !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) &&
  isset($_POST['repassword']) && !empty($_POST['repassword']) && isset($_POST['email']) &&
  !empty($_POST['email']))
	
{	
$realname=$_POST['realname'];
$username=$_POST['username'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$email=$_POST['email'];
} else
	exit("برخی از فیلدها مقداردهی نشده است");

if($password !=$repassword)
	exit("کلمه عبور و تکرار آن مشابه نیست");

if(filter_var($email,FILTER_VALIDATE_EMAIL)===false)
	exit("پست الکترونیک وارد شده صحیح نیست");

$link=mysqli_connect("localhost","root","","shop_db");

if(mysqli_connect_errno())
	exit("خطایی با شرح زیر رخ داده است:" .mysqli_connect_error());
$query="INSERT INTO users (realname,username,password,email,type) VALUES
('$realname','$username','$password','$email','0')";

if(mysqli_query($link,$query)===true)
	echo("<p style='color:green;'><b>" .$realname.
		" گرامی عضویت شما با نام کاربری" .$username.
		"در فروشگاه *گل افتو* با موفقیت انجام شد" ."</b></p>");
else
	echo("<p style='color:red;'><b>عضویت شما در فروشگاه انجام نشد</b></p>");

mysqli_close($link);

include("includes/footer.php");