<?php
include("lib.php");
$id=$_GET['id'];
//echo $id;
$del=update_customer($id);
echo $del;
if($del==1)
{
	header("Location:index.php");
}
?>