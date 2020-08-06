<?php 
include("lib.php");
$fn=$_POST['fn'];
$ln=$_POST['ln'];
$phn=$_POST['phn'];
$country=$_POST['country_list'];
$email=$_POST['email'];
$state=$_POST['state_list'];
$pincode=$_POST['pincode'];
//echo $fn,$ln,$phn,$country,$email,$state,$pincode;
$filename=$_FILES['file']['name'];
$location = "Uploads/".$filename;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   $uploadOk = 0;
}

if($uploadOk == 0){
   echo 0;
}else{
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
     // echo $location;
   }else{
      echo 0;
   }
}
//$sql = "INSERT INTO users (id,first_name,last_name,email,password,mobile_number,country)
//VALUES ('','$fn', '$ln', '$email','$pwd','$phn','$country')";
$add_c=addcustomer($fn,$ln,$phn,$email,$country,$state,$pincode,$filename);
if ($add_c) {
	$data['status']='success';
	//$data['msg']='You are registered!';
} else {
	
 $data['status']='fail';
//$data['msg']='Something went wrong!';
}
echo json_encode($data);


?>