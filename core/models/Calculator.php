<?php

namespace App\Models;

class Calculator extends Db {

    public function setData($num1, $num2, $operator, $result) {
        $sql = "INSERT INTO history (num1, num2, operator, result) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$num1, $num2, $operator, $result]);
    }

     public function getData()
    {
        $stmt = $this->db->query("SELECT * FROM history");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

