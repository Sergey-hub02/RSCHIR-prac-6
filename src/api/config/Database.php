<?php

namespace Config;

use PDO;
use PDOException;

class Database {
  private string $host = "MYSQL";
  private string $dbName;
  private string $user = "admin";
  private string $password = "admin";

  /**
   * @param string $dbName      название базы данных
   */
  public function __construct(string $dbName = "lombard") {
    $this->dbName = $dbName;
  }

  /**
   * @return PDO
   */
  public function connect(): PDO {
    $conn = null;

    try {
      $conn = new PDO(
        "mysql:host=$this->host;dbname=$this->dbName",
        $this->user,
        $this->password
      );
    }
    catch (PDOException $e) {
      echo "[ERROR]: {$e->getMessage()}" . PHP_EOL;
    }

    return $conn;
  }
}
