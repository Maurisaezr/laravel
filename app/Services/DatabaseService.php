<?php

namespace App\Services;

use PDO;
use PDOException;

class DatabaseService
{
    private $pdo;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $host = config('database.connections.mysql.host');
        $dbname = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $port = config('database.connections.mysql.port');

        try {
            $this->pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            throw new \Exception('Error de conexión a la base de datos: ' . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }

public function query($sql, $params = [])
{
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

public function insert($sql, $params = [])
{
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute($params);
}



public function callProcedure($procedureName, $params = [])
{
    $placeholders = implode(',', array_fill(0, count($params), '?'));
    $sql = "CALL $procedureName($placeholders)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($params);
}

}