<?php
include("lib.php");
if (! empty($_POST["country_id"])) {
   
    $countryId = $_POST["country_id"];
	//echo $countryId;
    $stateResult=getstates($countryId);
    ?>
<option value="">Select State</option>
<?php
    foreach ($stateResult as $state) {
        ?>
<option value="<?php echo $state["id"]; ?>"><?php echo $state["name"]; ?></option>
<?php
    }
}
?>