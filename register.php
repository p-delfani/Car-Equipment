<?php
include("includes/header.php");
?>

<br/>
 <form name="register" action="action_register.php" method="POST">
    <table style="width: 50%;" border="0" style="margin-left: auto;margin-right:auto;" >
	 <tr>
		<td style="width: 40%;">نام واقعی<span style="color: red;">*</span></td>
		 <td style="width: 60%;"><input type="text"  style="text-align: left; id="realname" name="realname"/></td>
		</tr>
		
		<tr>
		<td>نام کاربردی<span style="color: red;">*</span></td>
			<td><input type="text" style="text-align: left;" id="username" name="username"/></td>
		</tr>
		
		<tr>
		<td>کلمه عبور<span style="color: red;">*</span></td>
			<td><input type="password" style="text-align: left;" id="password" name="password"/></td>
		</tr>
		
		<tr>
		<td>تکرار کلمه عبور<span style="color: red;">*</span></td>
			<td><input type="password" style="text-align: left;" id="repassword" name="repassword"/></td>
		</tr>
		
		<tr>
		<td>پست الکترونیکی<span style="color: red;">*</span></td>
			<td><input type="text" style="text-align: left;" id="email" name="email"/></td>
		</tr>
		
		<tr>
		<td><br/><br/></td>
			<td><input type="submit" value="ثبت نام"/>
			&nbsp;&nbsp;&nbsp;
			<input type="reset" value="جدید"/></td>
		</tr>
	 </table>
</form>

<?php
include("includes/footer.php");
?>