<?php 
include("lib.php");
include("header.php");
$id=$_GET['id'];
$countryResult=getcountries();
$customer=get_cutomer_details($id);
//print_r($customer);
$country_id=$customer[0]['country'];
$state=$customer[0]['state'];
$image=$customer[0]['image'];
?>
<html>

<body>
<div class="container" style="margin-top:20px;max-width:-webkit-fill-available">
<form action="" method="POST" id="signup_form" enctype="multipart/form-data">
<div class="row">
<div class="col-md-6">
<div class="form-group">
    <label for="fn">First Name:</label>
    <input type="text" class="form-control" name="fn" placeholder="Enter First Name" id="fn" value=<?php echo $customer[0]['fn'];?>>
  </div>
  </div>
  <div class="col-md-6">
<div class="form-group">
    <label for="ln">Last Name:</label>
    <input type="text" class="form-control" name="ln" placeholder="Enter Last Name" id="ln" value=<?php echo $customer[0]['ln']?>>
  </div>
  </div>
  </div>
  <div class="row">
<div class="col-md-6">
  <div class="form-group">
    <label for="phn">Mobile Number:</label>
    <input type="text" class="form-control" name="phn" placeholder="Enter Mobile Number" id="phn" value=<?php echo $customer[0]['phn']?>>
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email" id="email" value=<?php echo $customer[0]['email']?>>
  </div>
  </div>
  </div>
  <div class="row">
			<div class="col-md-6">
  <div class="form-group">
            <label>Country:</label><br /> 
			<select name="country" id="country_list" class="form-control"
                onChange="getState(this.value);">
                <option value="">Select Country</option>
<?php
foreach ($countryResult as $country) {
    ?>
<option value="<?php echo $country["id"]; ?>"><?php echo $country["name"]; ?></option>
<?php
}
?>
</select>
</div>
</div>
        <div class="col-md-6">
  <div class="form-group">
            <label>State:</label><br /> <select name="state"
                id="state_list" class="form-control">
                <option value="">Select State</option></select>
				</div>
				</div>
           
        </div>
		<div class="row">
		 <div class="col-md-6">
<div class="form-group">
    <label for="pincode">Pincode:</label>
    <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode" id="pincode" value="<?php echo $customer[0]['pincode']?>">
  </div>
  </div>
  <div class="col_md_6">
  <div class="form-group">
    <label>Upload photo:</label>
	<input type="file" name="image" id="file" required="image">
	<img src="Uploads/<?php echo $customer[0]['image']?>" style="width:50px;height:50px;"
  </div>
  </div>
  </div>
  <button type="button" class="btn btn-primary" id="edit_customer" name="edit_customer">Edit Customer</button>
</form>
</div>
</body>
<script>
var state = <?php echo $state; ?>;
var country =<?php echo $country_id; ?> ;
var image ="<?php echo $image; ?>" ;
var id =<?php echo $id; ?> ;
console.log(image);
$(document).ready(function(){
  $("#country_list").val(country);
  //$("#state_list").val(state);
  getState(country);
  $("#state_list").val(state);
});
function getState(val) {
	$.ajax({
	type: "POST",
	url: "get_state.php",
	data:'country_id='+val,
	success: function(data){
		$("#state_list").html(data);
		//$("#loader").hide();
	}
	});
}
$("#edit_customer").click(function(e) {
				var fn=$("#fn").val();	
				var ln=$("#ln").val();
				var phn=$("#phn").val();	
				var email=$("#email").val();	
				var pincode=$("#pincode").val();
				var country_list=$("#country_list").val();
				var state_list=$("#state_list").val();
				var fd = new FormData();
				var files = $('#file')[0].files[0];
				fd.append('fn',fn);
				fd.append('ln',ln);
				fd.append('phn',phn);
				fd.append('email',email);
				fd.append('pincode',pincode);
				fd.append('country_list',country_list);
				fd.append('state_list',state_list);
				fd.append('state',state);
				fd.append('file',files);
				fd.append('image',image)
			fd.append('id',id);	//console.log(fn);console.log(ln);console.log(phn);console.log(email);console.log(pincode);console.log(country_list);console.log(state_list);
				if(fn == "")
				{
					alert("Please enter First Name");
					return false;
				}
				if(ln == "")
				{
					alert("Please enter Last Name");
					return false;
				}
				if(phn == "")
				{
					alert("Please enter Mobile Number");
					return false;
				}
			//	var a = /^\d{10}$/;
			//	console.log(isNaN(phn));
			//console.log(phn.length);
			if (isNaN(phn))
				{
				
					alert("Please enter valid Mobile Number");
					return false;
				}
				if((phn.length < 1) || (phn.length > 10))
{
	
				(" Your Mobile Number must be 1 to 10 Integers");
				return false;
				}
			
				
				if(email == "")
				{
					alert("Please enter email");
					return false;
				}
				
				if(country_list == "")
				{
					alert("Please enter Country");
					return false;
				}
				// if(state_list == "")
				// {
					// alert("Please enter State");
					// return false;
				// }
				if(pincode == "")
				{
					alert("Please enter Pincode");
					return false;
				}
				if(fn != "" && ln != "" && phn != "" && email != "" && country_list != "" && pincode != "" && document.getElementById("file").files.length == 0 && (!isNaN(phn)) &&  phn.length == 10){
					
					$.ajax({
					  url:'edit_custom.php', //===PHP file name====
					  type: 'post',
					  data:fd,
					  //data:{'fn': fn, 'ln': ln,'email': email, 'state': state_list,'phn': phn, 'country': country_list ,'pincode':pincode},
					  dataType:'json',
					  processData: false,
						contentType: false,
					  success:function(response){
					  
							if(response['status'] == "success")
							{
								alert("Data has been updated successfully");
							}
							if(response['status'] == "fail")
							{
								alert("Something went wrong");
							}
						
					  }
					});
					e.preventDefault();
				}
				else if(fn != "" && ln != "" && phn != "" && email != "" && country_list != "" && pincode != "" && document.getElementById("file").files.length != 0 && (!isNaN(phn)) &&  phn.length == 10)
				{
				  $.ajax({
					  url:'edit_cust.php', //===PHP file name====
					  type: 'post',
					  data:fd,
					  //data:{'fn': fn, 'ln': ln,'email': email, 'state': state_list,'phn': phn, 'country': country_list ,'pincode':pincode},
					  dataType:'json',
					  processData: false,
						contentType: false,
					  success:function(response){
					  
							if(response['status'] == "success")
							{
								alert("Data has been updated successfully");
							}
							if(response['status'] == "fail")
							{
								alert("Something went wrong");
							}
						
					  }
					});
							
			e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
				}
		});
		
</script>
</html>
