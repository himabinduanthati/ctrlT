<?php 
include("lib.php");
$id=$_POST['id'];
$fn=$_POST['fn'];
$ln=$_POST['ln'];
$phn=$_POST['phn'];
$country=$_POST['country_list'];
$email=$_POST['email'];
$state=$_POST['state_list'];
if (empty($state)) {
	$state=$_POST['state'];
}
$pincode=$_POST['pincode'];
//echo $fn,$ln,$phn,$country,$email,$state,$pincode;
$filename=$_POST['image'];
echo $fn,$filename;
//$sql = "INSERT INTO users (id,first_name,last_name,email,password,mobile_number,country)
//VALUES ('','$fn', '$ln', '$email','$pwd','$phn','$country')";
$add_c=update_customer_details($id,$fn,$ln,$phn,$email,$country,$state,$pincode,$filename);
if ($add_c) {
	$data['status']='success';
	$data['msg']='You are registered!';
} else {
	
 $data['status']='fail';
$data['msg']='Something went wrong!';
}
echo json_encode($data);


?>