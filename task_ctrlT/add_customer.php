<?php include("lib.php");
include("header.php");
$countryResult=getcountries();
//print_r($countryResult);
?>
<html>

<body>
<style>
.h1{
	margin-top:8px;
}
.row{
	display:contents;
}
</style>
<div class="container-fluid" style="margin-top:20px;">
<form action="" method="POST" id="signup_form" enctype="multipart/form-data">
<div class="row">
<div class="col-md-6">
<div class="form-group">
    <label for="fn">First Name:</label>
    <input type="text" class="form-control" name="fn" placeholder="Enter First Name" id="fn">
  </div>
  </div>
  <div class="col-md-6">
<div class="form-group">
    <label for="ln">Last Name:</label>
    <input type="text" class="form-control" name="ln" placeholder="Enter Last Name" id="ln">
  </div>
  </div>
  </div>
  <div class="row">
<div class="col-md-6">
  <div class="form-group">
    <label for="phn">Mobile Number:</label>
    <input type="text" class="form-control" name="phn" placeholder="Enter Mobile Number" id="phn">
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email" id="email">
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
    <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode" id="pincode">
  </div>
  </div>
  <div class="col_md_6">
  <div class="form-group">
    <label>Upload photo:</label>
	<input type="file" name="image" id="file" required="image">
  </div>
  </div>
  </div>
  <button type="button" class="btn btn-primary" id="add_customer" name="add_customer">Add Customer</button>
</form>
</div>
</body>
<script>
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
$("#add_customer").click(function(e) {
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
				fd.append('file',files);
				//console.log(fn);console.log(ln);console.log(phn);console.log(email);console.log(pincode);console.log(country_list);console.log(state_list);
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
				if(state_list == "")
				{
					alert("Please enter State");
					return false;
				}
				if(pincode == "")
				{
					alert("Please enter Pincode");
					return false;
				}
				if( document.getElementById("file").files.length == 0 ){
					alert("Please Upload Image");
					return false;
				}
				if(fn != "" && ln != "" && phn != "" && email != "" && country_list != "" && state_list != "" && pincode != "" && document.getElementById("file").files.length != 0 && (!isNaN(phn)) &&  phn.length == 10)
				{
				  $.ajax({
					  url:'add_cust.php', //===PHP file name====
					  type: 'post',
					  data:fd,
					  //data:{'fn': fn, 'ln': ln,'email': email, 'state': state_list,'phn': phn, 'country': country_list ,'pincode':pincode},
					  dataType:'json',
					  processData: false,
						contentType: false,
						
					  success:function(response){
					  console.log(response);
							if(response['status'] == "success")
							{
								swal("New Customer has added succesfully");
							}
							if(response['status'] == "fail")
							{
								alert("Something went wrong");
							}
						
					  }
					});
}		
			e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
		});
</script>
</html>
