<?php

namespace Foundation\Database;

use Config\DatabaseConfig;
use PDO;
use PDOException;

class Database
{

    private string $dsn, $user, $pass, $table, $query;
    private PDO $dbh;
    private bool $select = false;
    private array $args = [], $options = [
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    public function __construct($table)
    {
        $this->dsn = "mysql:host=" . DatabaseConfig::get('Host') . ";dbname=" . DatabaseConfig::get('Name');
        $this->user = DatabaseConfig::get('User');
        $this->pass = DatabaseConfig::get('Password');
        $this->table = $table;
        $this->connect();

    }

    private function connect(): void
    {
        try {
            $this->dbh = new PDO($this->dsn, $this->user, $this->pass, $this->options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function select(array $columns = ['*']): Database
    {
        $this->select = true;
        $columns = implode(',', $columns);
        $this->query = "SELECT $columns FROM `$this->table`";
        return $this;
    }

    public function delete(): Database
    {
        $this->query = "DELETE FROM `$this->table`";
        return $this;
    }

    public function update(array $data): Database
    {

        $this->query = "UPDATE `$this->table` SET ";
        foreach ($data as $value) {
            $this->query .= $value . " = :" . $value . ",";
        }
        $this->query = substr($this->query, 0, -1);
        return $this;
    }

    public function insert(array $data): Database
    {
        $this->query = "INSERT INTO `$this->table` (";
        $this->query .= implode(', ', $data) . ") VALUES ( ";
        foreach ($data as $value) {
            $this->query .= ":$value, ";
        }
        $this->query = substr($this->query, 0, -2);
        $this->query .= (" )");
        return $this;
    }


    public function where(string $column, string $operator, string $value): Database
    {
        $this->query .= " WHERE $column $operator $value";
        return $this;
    }

    public function orderBy(string $column, string $direction = 'ASC'): Database
    {
        $this->query .= " ORDER BY `$column` $direction";
        return $this;
    }

    public function limt(int $limit): Database
    {
        $this->query .= " Limit $limit";
        return $this;
    }

    public function offset(string $offset): Database
    {
        $this->query .= " OFFSET $offset";
        return $this;
    }

    public function join(string $table, string $on): Database
    {
        $this->query .= " JOIN $table ON $on";
        return $this;
    }

    public function args(array $args): Database
    {
        $this->args = $args;
        return $this;
    }

    public function run(): array|bool
    {
        //echo $this->query;
        //echo "<br />";
        if (!empty($this->args)) {
            $stmt = $this->dbh->prepare($this->query);
            $stmt->execute($this->args);
        } else {
            $stmt = $this->dbh->query($this->query);
        }
        if ($this->select) {
            $this->select = false;
            if ($stmt->rowCount() == 1) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        if ($stmt->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }
}
