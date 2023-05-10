<?php

namespace App\Models;

class Calculator extends Db {

    public function setData($num1, $num2, $operator, $result) {
        $sql = "INSERT INTO history (num1, num2, operator, result) VALUES (:num1, :num2, :operator, :result)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':num1', $num1);
        $stmt->bindParam(':num2', $num2);
        $stmt->bindParam(':operator', $operator);
        $stmt->bindParam(':result', $result);
        $stmt->execute();
    }

     public function getData()
    {
        $stmt = $this->db->query("SELECT * FROM `history` ORDER BY `id` DESC");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}



