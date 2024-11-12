<?php
$server="localhost";
$user="root";
$pw="";
$db="db_hms";
$con=mysqli_connect($server,$user,$pw,$db);
if(!$con){
	echo "ERROR CONNECTION";
}
?>