<?php 
include("includes/header.php");
if(isset($_SESSION["state_login"])&&$_SESSION["state_login"]===true){
?>
<script type="text/javascript">
<!--
//location.replace("index.php");
-->
</script>
<?php
}

$pro_code = $_POST['pro_code'];
$pro_name = $_POST['pro_name'];
$pro_qty = $_POST['pro_qty'];
$pro_price = $_POST['pro_price'];
$total_price = $_POST['total_price'];
$realname = $_POST['realname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$username = $_SESSION['username'];
/*کد های اتصال پایگاه داده*/
$link = mysqli_connect("localhost","root","","shop_db");
if(mysqli_connect_errno())
	exit("خطای با شرح زیر رخ داده است:".mysqli_connect_error());

$query = "SELECT * FROM orders"; 
$result = mysqli_query($link, $query); 
/*ایجاد کوئری*/
$query = "INSERT INTO orders id,
username,
orderdate,
pro_code,
pro_qty,
pro_price,
mobile,
address,
trackcode,
state,
)VALUES 
('0',
'$username',
'".date('y-m-d')."',
'$pro_code',
'$pro_qty',
'$pro_price',
'$mobile',
'$address',
'000000000000000000000000',
'0')";

if(mysqli_query($link,$query)===true){
	echo("<p style='color=red;'><br/><b>سفارش شما با موفقیت در سامانه ثبت شد </b></p>");
	
	echo("<p style='color=brown;'><br/><b>کاربر گرامی آقا /خانم $realname </b></p>");
	echo("<p style='color=brown;'><br/><b>محصول $pro_nameبا کد $pro_codeبه تعداد /مقدار $pro_qtyبا قیمت پایه $pro_priceریال را سفراش داده اید. </b></p>");
	echo("<p style='color=red;'><br/><b>مبلغ قابل پرداخت برای سفارش ثبت شده $pro_price ریال است</b></p>");
	echo("<p style='color=blue;'><br/><b>پس از بررسی سفارش و تایید آن با شما تماس گرفته خواهد شد </b></p>");
	echo("<p style='color=blue;'><br/><b>محصول خزیداری شده از طریق پست جمهوری اسلامی ایران طبق ادرس درج شده ارسال خواهد شد</b></p>");
	echo("<p style='color:blue;'><b>در هنگام تحویل گرفتن محصول آنرا بررسی و از صحت و سالم بودن آن اطمینان حاصل کنید.
	سپس مبلغ کالا را طبق فاکتور ارائه شده به مامور پست تحویل دهید </b><br/><br/></p>");
	$query="UPDATE products SET pro_qty=pro_qty-$pro_qty WHERE pro_code='$pro_code'";
	$result=mysqli_query($link,$query);
	}else
	echo("<p style='color:red;'><b> خطا در ثبت سفارش </b></p>");
	
	mysqli_close($link);
include("includes/footer.php");
	?>






}
