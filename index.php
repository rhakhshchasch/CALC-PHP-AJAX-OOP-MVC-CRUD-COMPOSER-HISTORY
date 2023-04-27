<?php require_once 'vendor/autoload.php'; 
use App\Models\Calculator;
$data = new Calculator();
$data->getData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/calculator-php-ajax/public/img/favicon.jpg" rel="shortcut icon" type="image/jpg">
    <link rel="stylesheet" href="public/styles/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="public/js/scrypt.js"></script>
    <title>Calculator</title>
</head>
<body>
<h1>Calculator</h1>
 <form class="form-message" id="form"> 
 <label for="num1">Enter first number</label>   
 <input type="text" name="num1" id=""><br><br>
 <select name="operator" id="">
    <option value="+">sum</option>
    <option value="-">difference</option>
    <option value="*">multiplication</option>
    <option value="/">division</option>
 </select><br><br>
 <label for="num2">Enter second number</label>   
 <input type="text" name="num2" id=""><br><br>
 <input type="hidden" name="submit" value="1">
 <input type="submit" value="Result!"><br><br>
 <div id="AJAX"> Итого: <div id="ajaxResult"></div></div>
 <div id="ajaxHistory"><h1>history</h1>
   <div class="wrapper">
      <?php foreach($data->getData() as $v): ?>
      <div id=<?php echo $v["id"] ?>>
      <span style="border: 1px solid green;cursor: pointer;" onclick="deleteRecord(<?php echo $v['id']; ?>)">
	  Delete
	 </span>
      <?php  echo "Count:{$v["id"]}=>{$v["num1"]}+{$v["num2"]}={$v["result"]}<br>"; ?> 
      </div>
      <?php endforeach;?>
</div> 
</form>
</body>
<script>
   	function deleteRecord(id) {
		$.ajax({
			url: 'core/controller/router.php',         	
			method: 'post',                    		
			data: {'id' : id},  				
			success: function(output){  			
				$("#"+id).remove();
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
		
		})
	}
</script>
</html>
