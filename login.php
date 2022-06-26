<?php
include("includes/header.php");
if(isset($_SESSION["state_login"])&&$_SESSION["state-login"]===true){
?>
<script type="text/javascript">
<!--
location.replace("index.php");
-->
</script>
<?php
}
?>
<br/>

<form name="login" action="action_login.php" method="POST">
<table style="width:50%;" border="0" style="margin-left:auto;margin-right:auto;" >

<tr>
  <td>نام کاربری<span style="color:red;">*</span></td>
  <td><input type="text" style="text-align:left;" id="username" name="username" /></td>
</tr>

<tr>
  <td>کلمه عبور<span style="color:red;">*</span></td>
  <td><input type="password" style="text-align:left;" id="password" name="password" /></td>
</tr>

<tr>
  <td><br/><br/></td>
  <td><input type="submit" value="ورود"/>&nbsp;&nbsp;&nbsp;<input type="reset" value="جدید"/>
      </td>
</tr>

</table>
</form>

<?php
include("includes/footer.php");
?>