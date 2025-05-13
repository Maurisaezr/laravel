<?php

namespace App\Services;

class DatabaseServiceAdvanced extends DatabaseService
{
    // Método para realizar consultas preparadas (sobrescribiendo)
    public function queryPrepared($sql, $params = [])
    {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    // Método para realizar inserciones preparadas (sobrescribiendo)
    public function insertPrepared($sql, $params = [])
    {
        $stmt = $this->getConnection()->prepare($sql);
        return $stmt->execute($params);
    }

    // Método para llamar procedimientos almacenados
    public function callProcedureAdvanced($procedureName, $params = [])
    {
        $placeholders = implode(',', array_fill(0, count($params), '?'));
        $sql = "CALL $procedureName($placeholders)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
