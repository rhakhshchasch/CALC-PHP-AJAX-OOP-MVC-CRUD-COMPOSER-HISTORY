<?php 
require_once 'vendor/autoload.php'; 
use App\Models\Calculator;
$data = new Calculator();
$data->getData();
$detect = new \Detection\MobileDetect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
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
 <p>Device:<span><b><?php echo $deviceType; ?></b></span></p>
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
 <div id="ajax"> 
	<div>answer:<div id="ajaxResult"></div></div>	
	<div class="del-number">delete:<div id="ajaxDel"></div></div>
</div>
 <div id="ajaxHistory"><h1>history</h1>
   <div class="wrapper">
      <?php
      foreach($data->getData() as $v):   
      ?>
      <div id=<?php echo $v["id"] ?>>
      <span class='button-del' onclick="deleteRecord(<?php echo $v['id']; ?>)">Delete</span><?php  echo "{$v["num1"]}+{$v["num2"]}={$v["result"]}<br>"; ?></div>
   <?php endforeach;?>
</div> 
</form>
</body>
</html>
