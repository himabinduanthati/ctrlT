function initAutocomplete() {
    var input1= document.getElementById('autocomplete-input1');
	if(input1)
	{
		var autocomplete1 = new google.maps.places.Autocomplete(input1);

		autocomplete1.addListener('place_changed', function() {
			var place1 = autocomplete1.getPlace();
			var y= JSON.stringify(place1);
			$("#tojson").val(y);
			// console.log(place1);
		});
	}
	var input = document.getElementById('autocomplete-input2');
	if(input)
	{
		var autocomplete2 = new google.maps.places.Autocomplete(input);
		autocomplete2.addListener('place_changed', function() {
			var place = autocomplete2.getPlace();
			var x= JSON.stringify(place);
			$("#fromjson").val(x);
			//console.log($("#fromjson").val());
		});
	}

	
	var input2 = document.getElementById('autocomplete-input3');
	if(input2)
	{
		// console.log(input2);
		var autocomplete3 = new google.maps.places.Autocomplete(input2);
		autocomplete3.addListener('place_changed', function() {
			var place2 = autocomplete3.getPlace();
			var x= JSON.stringify(place2);
			$("#fromjson").val(x);
			//console.log($("#fromjson").val());
		});
	}

	var input3= document.getElementById('autocomplete-input4');
	if(input3)
	{
		var autocomplete4 = new google.maps.places.Autocomplete(input3);
		autocomplete4.addListener('place_changed', function() {
			var place3 = autocomplete4.getPlace();
			var y= JSON.stringify(place3);
			$("#tojson").val(y);
			// console.log(place1);
		});
	}
	
}