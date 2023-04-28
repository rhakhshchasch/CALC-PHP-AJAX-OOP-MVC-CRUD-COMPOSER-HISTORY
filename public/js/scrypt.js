$(document).ready(function () {
	$('#form').submit(function (event) {
		event.preventDefault();					
		let form = $(this);
		$.ajax({
			url: 'core/controller/router.php',         
			method: 'post',                    		
			dataType: 'json',						
			data: form.serialize(),  				
			success: function (output) {  
				$("#ajax>div:first-child").css('display', 'flex');
				// console.log(output);
				if (output.Result == "Enter both values first") {
					$("#ajaxResult").text(output.Result);
				} else {
					output.Result = output.Result.reverse();
					$("#ajaxResult").text(output.Result[output.Result.length - 1].result);
					for (var i = 0; i < output.Result.length; i++) {
						var data = "<div id='" + output.Result[i].id + "'><span class='button-del' onclick=deleteRecord('" + output.Result[i].id + "')>Delete</span>"+ output.Result[i].num1 + output.Result[i].operator + output.Result[i].num2 + "=" + output.Result[i].result + "</div>";
					}
					$(".wrapper").prepend(data);	
				}
				$("input[type=text]").val("")
			},
			error: function (jqXHR, exception) {
				if (jqXHR.status === 0) {
					console.log('Not connect. Verify Network.');
				} else if (jqXHR.status == 404) {
					console.log('Requested page not found (404).');
				} else if (jqXHR.status == 500) {
					console.log('Internal Server Error (500).');
				} else if (exception === 'parsererror') {
					console.log('Requested JSON parse failed.');
				} else if (exception === 'timeout') {
					console.log('Time out error.');
				} else if (exception === 'abort') {
					console.log('Ajax request aborted.');
				} else {
					console.log('Uncaught Error. ' + jqXHR.responseText);
				}
			}
		});
});
});