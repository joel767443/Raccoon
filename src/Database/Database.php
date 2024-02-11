<?php

namespace WebApp\Database;
use PDO;
use PDOException;
use PDOStatement;

/**
 * Class Database
 */
class Database
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     *
     */
    public function __construct()
    {
        $config = include('config.php');

        $host = $config['database']['host'];
        $username = $config['database']['username'];
        $password = $config['database']['password'];
        $databaseName = $config['database']['databaseName'];
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$databaseName", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    /**
     * @param $query
     * @param $params
     * @return false|PDOStatement
     */
    public function query($query, $params = [])
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    /**
     * @param $result
     * @return mixed
     */
    public function fetchAssoc($result)
    {
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $table
     * @param $data
     * @return false|string
     */
    public function create($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        // Prepare the query
        $statement = $this->pdo->prepare($query);

        // Bind the values
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        // Execute the query
        try {
            $statement->execute();
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            die("Error executing the query: " . $e->getMessage());
        }
    }

    /**
     * @return void
     */
    public function close()
    {
        $this->pdo = null;
    }
}

