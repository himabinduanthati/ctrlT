$(function() {

    var start = moment();
    var end = moment().add(29, 'days');
	

    function cb(start, end) {
        $('#booking-date-range span').html(start.format('MMMM D, YYYY ') );
    }
    cb(start, end);
    $('#booking-date-range').daterangepicker({
	    "singleDatePicker": true,
    	"opens": "left",
	    "alwaysShowCalendars": true,	
        minDate: start,
        maxDate: end,
		
    }, cb);

	
    cb(start, end);

});

// Calendar animation and visual settings
$('#booking-date-range').on('show.daterangepicker', function(ev, picker) {
	$('.daterangepicker').addClass('calendar-visible calendar-animated bordered-style');
	$('.daterangepicker').removeClass('calendar-hidden');
});
$('#booking-date-range').on('hide.daterangepicker', function(ev, picker) {
	$('.daterangepicker').removeClass('calendar-visible');
	$('.daterangepicker').addClass('calendar-hidden');
});



$(function() {

var start = moment().subtract(65,'years');
var end = moment().subtract(18,'years');
function cb(start, end) {
	 $('#booking-date-range1 span').html(end.format('m/D/YYYY') );
//$('#booking-date-range1 span').html(end.format('m/D/YYYY') );
//console.log(end.format('YYYY-MM-DD'));
//$('#booking-date-range1').val(end.format('MM/D/YYYY') );
}
cb(start,end);
$('#booking-date-range1').daterangepicker({
"singleDatePicker": true,
"opens": "left",
"alwaysShowCalendars": true,
//minDate: start,
 showDropdowns: true,
    minYear: start,
    maxYear: end,
startDate: start,
endDate: end,
 minDate: start,
 maxDate: end,
}, cb);


cb(start,end);

});
$('#booking-date-range1').on('show.daterangepicker', function(ev, picker) {
	$('.daterangepicker').addClass('calendar-visible calendar-animated bordered-style');
	$('.daterangepicker').removeClass('calendar-hidden');
});
$('#booking-date-range1').on('hide.daterangepicker', function(ev, picker) {
	$('.daterangepicker').removeClass('calendar-visible');
	$('.daterangepicker').addClass('calendar-hidden');
});


$(function() {

    var start = moment();
    var end = moment().add(29, 'days');
	

    function cb(start, end) {
        $('#booking-date-range2 span').html(start.format('MMMM D, YYYY  hh:mm A') );
    }
    cb(start, end);
    $('#booking-date-range2').daterangepicker({
	    "singleDatePicker": true,
    	"opens": "left",
	    "alwaysShowCalendars": true,
		timePicker: true,
		timePicker24Hour:true,
        minDate: start,
        maxDate: end,
		
		locale: {
		format: 'M/D/YYYY hh:mm A'
            }
    }, cb);

	
    cb(start, end);

});
$('#booking-date-range2').on('show.daterangepicker', function(ev, picker) {
	$('.daterangepicker').addClass('calendar-visible calendar-animated bordered-style');
	$('.daterangepicker').removeClass('calendar-hidden');
});
$('#booking-date-range2').on('hide.daterangepicker', function(ev, picker) {
	$('.daterangepicker').removeClass('calendar-visible');
	$('.daterangepicker').addClass('calendar-hidden');
});

$(function() {

    var start = moment();
    var end = moment().add(29, 'days');
	

    function cb(start, end) {
        $('#booking-date-range123 span').html(start.format('MMMM D, YYYY  hh:mm A') );
    }
    cb(start, end);
    $('#booking-date-range123').daterangepicker({
	    "singleDatePicker": true,
    	"opens": "left",
	    "alwaysShowCalendars": true,
		minDate: start,
        maxDate: end,
		locale: {
		format: 'DD/MM/YYYY'
			},
		
    }, cb);

	
    cb(start, end);

});
$('#booking-date-range123').on('show.daterangepicker', function(ev, picker) {
	$('.daterangepicker').addClass('calendar-visible calendar-animated bordered-style');
	$('.daterangepicker').removeClass('calendar-hidden');
});
$('#booking-date-range123').on('hide.daterangepicker', function(ev, picker) {
	$('.daterangepicker').removeClass('calendar-visible');
	$('.daterangepicker').addClass('calendar-hidden');
});









