<?php

class QueryBuilder {
    protected PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function fetchAll($table) {
        $query = $this->pdo->prepare("SELECT * FROM {$table}");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert($table, $parameters)
    {
        $sql = 'INSERT INTO %s (%s) VALUES (%s)';
        $columns = array_keys($parameters);
        $placeholders = array_map(function ($placeholder) {
            return ":{$placeholder}";
        }, array_keys($parameters));
        $sql = sprintf(
            $sql,
            $table,
            implode(', ', $columns),
            implode(', ', $placeholders)
        );
        try {
            $query = $this->pdo->prepare($sql);
            $query->execute($parameters);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
