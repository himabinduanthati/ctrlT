<?php
include("lib.php");
include("header.php");
?>
	<!-- Content
	================================================== -->
	<div class="container">
	
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
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<b><h4 class="modal-title">Order Details</h4></b>
			</div>
			<div class="modal-body">
			
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
</script>


			