<?php
namespace App\Controllers;
use App\Models\CalculatorRemoveData as Model;

class Calculator {
    public $num1;
    public $operator;
    public $num2;
    public $id;

    public function __construct($num1, $num2, $operator,$id){
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->operator = $operator;
        $this->id = $id;
        $this->removeData();
    }

    public function add(){
        return $this->num1 + $this->num2;
    }

    public function subtract(){
        return $this->num1 - $this->num2;
    }

    public function multiply(){
        return $this->num1 * $this->num2;
    }

    public function divide(){
        if($this->num2 == 0){
            return "You cannot divide by zero";
        } else {
            return $this->num1 / $this->num2;
        } 
    }

    public function getResult(){    
        
        $result = NULL;

        if($this->num1 == NULL || $this->num2 == NULL){
            $result = "Enter both values first";
        } else {

        if(!is_numeric($this->num1) || !is_numeric($this->num2)){
            $result = "Please enter numeric values";
        } else {
            switch($this->operator){
                case '+':
                    $result = $this->add();
                    break;
                
                case '-':
                    $result = $this->subtract();
                    break;
                
                case '*':
                    $result = $this->multiply();
                    break;
                
                case '/':
                    $result = $this->divide();
                    break;

                default:
                    $result = "Something went wrong";
                    break;
            }
        }
        }
        if(!is_string($result)){
            $model = new Model();
            $model->setData($this->num1, $this->num2, $this->operator, $result);
        }
        $result = json_encode(["Result" => $result]);
        return $result;
    }

    public function removeData()
    {
        $model = new Model();
        $model->removeData($this->id);
    }
}