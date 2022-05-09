<?php

class Dbh
{
    // hier maak ik mijn properties 
    private $servername;
    private $username;
    private $pwd;
    private $dbname;
    private $charset;

    protected function connect()
    {
        // Deze funtion zal connectie maken met database "freemarket"
        $this->servername = "localhost";
        $this->username = "root";
        $this->pwd = "";
        $this->dbname = "hotelterduin";
        $this->charset = "utf8mb4";

        // try catch method check erros connectie met mysql
        try {
            $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset; //Als "mysql:host niet werk change to "mysqli:host
            $pdo = new PDO($dsn, $this->username, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "No database connection. Failed:" . $e->getMessage() . "<br/>";
            die();
        }
    }
}
