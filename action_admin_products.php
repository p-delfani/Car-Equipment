<?php
include("includes/header.php");
if(!(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true&&$_SESSION["user_type"]=="admin")){
?>
<script type="text/javascript">
<!--
location.replace("index.php");
	-->
</script>
<?php
 }
?>
<?php 
if(isset($_POST['pro_code'])&& !empty($_POST['pro_code'])&&
  isset($_POST['pro_name'])&& !empty($_POST['pro_name'])&&
  isset($_POST['pro_qty'])&& !empty($_POST['pro_qty'])&&
  isset($_POST['pro_price'])&& !empty($_POST['pro_price'])&&
  isset($_POST['pro_detail'])&& !empty($_POST['pro_detail'])){
	$pro_code = $_POST['pro_code'];
	$pro_name = $_POST['pro_name'];
	$pro_qty = $_POST['pro_qty'];
	$pro_price = $_POST['pro_price'];
	$pro_image = basename($_FILES["pro_image"]["name"]);
	$pro_detail = $_POST['pro_detail'];
}else
	exit("برخی فیلد ها مقدار دهی نشده است ");
	$link=mysqli_connect("localhost","root","","shop_db");

if(mysqli_connect_errno())
	exit("خطایی با شرح زیر رخ داده است:" .mysqli_connect_error());
if(isset($_GET['action'])){
	$id=$_GET['id'];
	switch($_GET['action']){
		case 'EDIT':
			$query="UPDATE products SET
			pro_code='$pro_code',
			pro_name='$pro_name',
			pro_qty='$pro_qty',
			pro_price='$pro_price',
			pro_detail='$pro_detail',
			WHERE pro_code='$id'";
			if(mysqli_query($link,$query)===true)
				echo("<p style='color:green;'><b>محصول انتخاب شده با موفقیت ویرایش شد</b></p>");
			else
				echo("<p style='color:red;'><b>خطا در ویرایش محصول</b></p>");
			break;
		case 'DELETE':
			break;
	}
	mysqli_close($link);
	include("includes/footer.php");
	exit();
}

$target_dir = "images/products/";
$target_file = $target_dir.$_FILES["pro_image"]["name"];
$uploadOk =1;
$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
$check = getimagesize($_FILES["pro_image"]["tmp_name"]);

if($check!==false){
	echo"پرونده انتخابی یک تصویر از نوع -".$check["mime"]."است<br/>";
	$uploadOk=1;
}else{
	echo"پرونده انتخاب شده یک تصویر نیست <br/>";
	$uploadOk=0;
}

if(file_exists($target_file)){
	echo"پرونده ای با همین نام در سرویس دهنده میزبان وجود دارد <br/>";
	$uploadOk=1;
}

if($_FILES["pro_image"]["size"]>500000){
	echo"اندازه پرونده انتخابی بیشتر از 500کیلوبایت است <br/>";
	$uploadOk=0;
}

$imageFileType!= strtolower($imageFileType);
if($imageFileType!="jpg"&&$imageFileType!="png" && $imageFileType!="jpeg" && $imageFileType!="gif"){
	echo"فقط پسوندهای JPG,JPEG,PNG &GIF برای پرونده مجاز است<br/>";
	$uploadOk=0;
}
if($uploadOk==0){
	echo"پرونده انتخاب شده به سرویس دهنده میزبان ارسال نشد<br/>";
}else{	
	if(move_uploaded_file($_FILES["pro_image"]["tmp_name"],$target_file)){
		echo"پرونده".$_FILES["pro_image"]["name"]."با موفقیت به سرویس دهنده میزبان انتقال یافت<br/>";
	}else{
		echo"خطا در ارسال پرونده به سرویس دهنده میزبان رخ داده است <br/>";
	}
}

if($uploadOk==1){
	
$query = "INSERT INTO products (pro_code,pro_name,pro_qty,pro_price,pro_image,pro_detail) VALUES ('$pro_code','$pro_name','$pro_qty','$pro_price','$pro_image','$pro_detail')";
	if(mysqli_query($link,$query)=== true)
		echo("<p style = 'color:green;'><b>کالا با موفقیت به انبار اضافه شد </b></p>");
	else 
		echo("<p style = 'color:red;'><b>خطا در ثبت مشخصات کالا در انبار  </b></p>");
}else
			echo("<p style = 'color:red;'><b>خطا در ثبت مشخصات کالا در انبار  </b></p>");


mysqli_close($link);

include("includes/footer.php");
?>
