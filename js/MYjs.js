$('#form').on('submit',function(e){

	e.preventDefault();
	$('.weather_box').html('');

	var city=$('#city').val();

	$.ajax({
		url : "weather_generate.php",
		type : "POST",
		data : {city : city},
		success :function(data){
			console.log(data);
			$('.weather_box').append(data);
			$('#form')[0].reset();
		}		
	});
});
