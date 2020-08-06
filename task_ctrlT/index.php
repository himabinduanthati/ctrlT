<?php include("header.php");
include("lib.php");
 ?>
<style>
.h1{
	margin-top:8px;
}
.row{
	display:contents;
}
</style>
<div class="container-fluid">
<nav class="navbar navbar-dark bg-dark " style="max-height:50px;">

  <span class="navbar-brand mb-0 h1" style="line-height:0px;margin-left:auto;padding:0px 100px;float:inherit;"> 
 <button type="button" href="add_customer.php" class="btn btn-primary add_customer" data-toggle="modal" data-target="#myModaladd">
  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
  <path fill-rule="evenodd" d="M13 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
</svg>Add Customer</span></button>
</nav>

</div>
	<!-- Content
	================================================== -->
	<div class="container-fluid">
	
	<div class="row" >
		<table id="customers">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Mobie Number</th>
					<th>Email</th>
					<th>Ediit</th>
					<th>Delete</th>
					
				</tr>
           </thead>
		</table>
	</div>
</div>
<div class="modal fade" id="myModal" >
		<div class="modal-dialog modal-lg">
		  <div class="modal-content">
			<div class="modal-header" style="display:inline-table;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<b><h4 class="modal-title">Edit Customer</h4></b>
			</div>
			<div class="modal-body">
			
			</div>

		  </div>
		</div>
		
	</div>
	<div class="modal fade" id="myModaladd" >
		<div class="modal-dialog modal-lg">
		  <div class="modal-content">
			<div class="modal-header" style="display:inline-table;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<b><h4 class="modal-title">Add Customer</h4></b>
			</div>
			<div class="modal-body">
			
			</div>
			<div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
		  </div>
		</div>
		
	</div>
<!-- script to get data from given page using datatables -->	
<script type="text/javascript">
$(document).ready( function () {
   $('#customers').DataTable( {
		 "processing": true,
        "serverSide": true,

		 //"aaSorting": [ [0,"desc" ]],//sort data in descending order according to id
        "ajax": "customers_list.php"
    }  );
	$(document).on('click','.delete_customer',function(e){
				e.preventDefault();
				var id=$(this).attr('id');
				// console.log(id);
			 
				swal({
					title: "Are you sure you want to Delete it?",
					text: "",
					icon: "warning",
					buttons: [
					'No, cancel it!',
					'Yes, I am sure!'
					],
					dangerMode: true,
				}).then(function(isConfirm) {
					if (isConfirm) {
						swal({
						  title: 'Deleted!',
						  text: 'Customer has been deleted successfully!',
						  icon: 'success'
						}).then(function() {
							
						  window.location.href = "delete_customer.php?id="+id;
						  
						});
					} else {
						swal("Cancelled", "Cancelled request :)", "error");
					}
				});
			});
} );
$(document).on('click','.orderd',function(){
	var href = $(this).attr('href');
	//alert(href);
	event.preventDefault();
	$('#myModal').modal({show:true});
	$('#myModal .modal-body').load(href);
});
$(document).on('click','.add_customer',function(){
	var href = $(this).attr('href');
	//alert(href);
	event.preventDefault();
	$('#myModaladd').modal({show:true});
	$('#myModaladd .modal-body').load(href);
});
</script>


			