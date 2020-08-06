<?php
include("config.php");
include("db.php");
$link=db_connect($dbhost, $dbusername, $dbpassword,$dbname);
function getcountries()
{
	$countries=array();
	$i=0;
	$res= db_query("SELECT * FROM `country`");
	if(db_num_rows($res)==0)
	{ 
		$countries=1;
		return $countries;
	}
	else
	{
		while($row2=db_fetch_assoc($res))
		{
			$countries[$i]["id"]=$row2['id'];
			$countries[$i]["name"]=$row2['name'];
			$i++;
		}
		return $countries;
	}
}
function getstates($id)
{
	$states=array();
	$i=0;
	$res= db_query("SELECT * FROM `states` where country_id=$id");
	if(db_num_rows($res)==0)
	{ 
		$states=1;
		return $states;
	}
	else
	{
		while($row2=db_fetch_assoc($res))
		{
			$states[$i]["id"]=$row2['id'];
			$states[$i]["name"]=$row2['name'];
			$i++;
		}
		return $states;
	}
}
function addcustomer($fn,$ln,$phn,$email,$country,$state,$pincode,$image)
{
	$usercheck=db_query("INSERT INTO `customers`( `first_name`, `last_name`, `mobile_number`, `email`, `country_id`, `state_id`, 
	`pin_code`, `image`, `status`) VALUES ('$fn','$ln','$phn','$email','$country','$state','$pincode','$image',1)");
	//echo "INSERT INTO `customers`( `first_name`, `last_name`, `mobile_number`, `email`, `country_id`, `state_id`, 
	//`pincode`, `image`, `status`) VALUES ('$fn','$ln','$phn','$email','$country','$state','$pincode','$image',1)";
	if($usercheck==1)
	{
		return true;
	}
}
function update_customer($id)
{
$q=db_query("UPDATE `customers` SET `status`=0 WHERE id=$id");
//echo "UPDATE `customers` SET `status`=0 WHERE id=$id";
if($q)
	{
		return true;
	}
	else
	{
		return false;
	}	
}
function get_cutomer_details($id)
{
	$details=array();
	$i=0;
	$res= db_query("SELECT * FROM `customers` where id=$id");
	if(db_num_rows($res)==0)
	{ 
		$details=1;
		return $details;
	}
	else
	{
		while($row2=db_fetch_assoc($res))
		{
			$details[$i]["id"]=$row2['id'];
			$details[$i]["fn"]=$row2['first_name'];
			$details[$i]["ln"]=$row2['last_name'];
			$details[$i]["phn"]=$row2['mobile_number'];
			$details[$i]["email"]=$row2['email'];
			$details[$i]["country"]=$row2['country_id'];
			$details[$i]["state"]=$row2['state_id'];
			$details[$i]["pincode"]=$row2['pin_code'];
			$details[$i]["image"]=$row2['image'];
			$details[$i]["status"]=$row2['status'];
			$i++;
		}
		return $details;
	}
}
function update_customer_details($id,$fn,$ln,$phn,$email,$country,$state,$pincode,$image)
{
	//echo "UPDATE `customers` SET `first_name`='$fn',`last_name`='$ln',`mobile_number`=$phn,`email`='$email',`country_id`=$country,`state_id`=$state,`pin_code`=$pincode,`image`='$image' WHERE id=$id";
$q=db_query("UPDATE `customers` SET `first_name`='$fn',`last_name`='$ln',`mobile_number`=$phn,`email`='$email',`country_id`=$country,`state_id`=$state,`pin_code`=$pincode,`image`='$image' WHERE id=$id");
//echo "UPDATE `customers` SET `status`=0 WHERE id=$id";
if($q)
	{
		return true;
	}
	else
	{
		return false;
	}	
}
?>