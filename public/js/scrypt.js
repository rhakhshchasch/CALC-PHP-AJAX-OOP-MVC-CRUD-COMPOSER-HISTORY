$(document).ready(function () {
	
	$('#form').submit(function (event) {
		event.preventDefault();					/* отменяет поведение по умолчанию */

		let form = $(this);

		// console.log(event);

		$.ajax({
			url: 'core/controller/router.php',         	/* Куда пойдет запрос */
			method: 'post',                    		/* Метод передачи (post или get) */
			dataType: 'json',						/* Тип данных в ответе (xml, json, script, html) */
			data: form.serialize(),  				/* Параметры передаваемые в запросе */
			success: function(output){  			/* функция которая будет выполнена после успешного запроса  */
								/* В переменной data содержится ответ от calculator.php */
				let count = output.Result.length;
				let result = output.Result[count - 1].result;
				$("#ajaxResult").html(result);
				for (var i = 0; i < output.Result.length; i++) {
					var data = "<div id='" + output.Result[i].id + "'><span class='button-del' onclick=deleteRecord('" + output.Result[i].id + "')>Delete</span>"+ output.Result[i].num1 + output.Result[i].operator + output.Result[i].num2 + "=" + output.Result[i].result + "</div>";
				}
				if(output.Result != "Enter both values first") $(".wrapper").append(data)			
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
