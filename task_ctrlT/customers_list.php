<?php
include("config.php");
header('Content-Type: application/json; charset=utf-8');
// DB table to use
$table = 'customers';
 $primaryKey='id';
// SQL server connection information
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
	array( 'db' => 'fullname', 'dt' => 1 ),
    array( 'db' => 'mobile_number',  'dt' => 2 ),
    array( 'db' => 'email',   'dt' => 3 ),
		array(
			'db'=> 'id','dt' => 4,
			'formatter' => function( $d, $row ) {				
				$img='';
			$img='<a href="edit_customer.php?id='.$row['id'].'&orderd=1" class="orderd"" ">Edit</a>';
				return $img;
			} 
		),
	array(
			'db'=> 'id','dt' => 5,
			'formatter' => function( $d, $row ) {				
				$img='';
			$img='<a href="index.php?" class="btn link delete_customer" id='.$row['id'].'>Delete</a>';
				return $img;
			} 
		)
  
);
$sql_details = array(
    'user' => $dbusername,
    'pass' => $dbpassword,
    'db'   => $dbname,
    'host' => $dbhost
);

include( 'ssp.class.php' );
  //here condition is to get trips for travel date less than current date
echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,null,'status=1'));