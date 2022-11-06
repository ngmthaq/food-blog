<?php

class Database
{
    protected $conn;
    protected $sql;

    // Init database connection
    public function __construct()
    {
        $_dbHost = DB_HOST;
        $_dbPort = DB_PORT;
        $_dbName = DB_NAME;
        $_dbUsername = DB_USERNAME;
        $_dbPassword = DB_PASSWORD;

        $this->conn = new PDO("mysql:host=$_dbHost;dbname=$_dbName;port=$_dbPort", $_dbUsername, $_dbPassword);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    // Disconnect database
    public function __destruct()
    {
        $this->conn = null;
    }

    // Get data from sql
    public function get()
    {
        try {
            $stmt = $this->conn->prepare($this->sql);
            $stmt->execute();
            $this->sql = null;

            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            consoleLog($th);

            return false;
        }
    }

    // Excute sql
    public function execute()
    {
        try {
            $stmt = $this->conn->prepare($this->sql);
            $stmt->execute();
            $this->sql = null;

            return true;
        } catch (\Throwable $th) {
            consoleLog($th);

            return false;
        }
    }

    public function log()
    {
        return $this->sql;
    }

    public function sql(string $sql)
    {
        $this->sql = $sql;

        return $this;
    }
}
