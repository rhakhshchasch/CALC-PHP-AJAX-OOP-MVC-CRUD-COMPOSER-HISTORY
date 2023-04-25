<?php

require '../../vendor/autoload.php';

use App\Controllers\Calculator;

$num1 = @$_POST["num1"]; 
$num2 = @$_POST["num2"]; 
$operator = @$_POST["operator"];
$id = @$_POST["id"];
$calculation = new Calculator($num1, $num2, $operator, $id);
echo $calculation->getResult();





