<?php
$num1='';
$num2='';
$r='';

if(isset($_POST['btn_add']))
{
	$num1=$_POST['txt_num1'];
	$num2=$_POST['txt_num2'];
	$r=$num1+$num2;
}
if(isset($_POST['btn_sub']))
{
$num1=$_POST['txt_num1'];
	$num2=$_POST['txt_num2'];
	$r=$num1-$num2;	
	}
if(isset($_POST['btn_mul']))
{
$num1=$_POST['txt_num1'];
	$num2=$_POST['txt_num2'];
	$r=$num1*$num2;	
	}
if(isset($_POST['btn_div']))
{
$num1=$_POST['txt_num1'];
	$num2=$_POST['txt_num2'];
	$r=$num1/$num2;	
	}	
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post">
<table width="630" height="546" border="1">
  <tr>
    <td width="236"><p align="center">NUNBER 1</p></td>
    <td width="202"><label for="txt_num1"></label>
      <input type="text" name="txt_num1" id="txt_num1" /></td>
  </tr>
  <tr>
    <td><div align="center">NUMBER 2</div></td>
    <td><label for="txt_num2"></label>
      <input type="text" name="txt_num2" id="txt_num2" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="btn_add" id="btn_add" value="ADDITION" />
      <input type="submit" name="btn_sub" id="btn_sub" value="SUBTRACTION" />
      <input type="submit" name="btn_mul" id="btn_mul" value="MULTIPLICATION" />
      <input type="submit" name="btn_div" id="btn_div" value="DIVISION" /></td>
    </tr>
  <tr>
    <td><div align="center">RESULT</div></td>
    <td><?php echo $r ?></td>
  </tr>
</table>

</form>
</body>
</html>