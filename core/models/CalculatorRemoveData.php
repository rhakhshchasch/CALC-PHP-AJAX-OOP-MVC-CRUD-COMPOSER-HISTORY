<?php
namespace App\Models;

class CalculatorRemoveData extends Calculator
{
    public function removeData($id)
    {
        $sql = "DELETE FROM history WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id',$id );
        $stmt->execute();
    }
}
