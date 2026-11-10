<?php

namespace AP35\Core;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

use AP35\Core\Interfaces\DatabaseInterface;

/**
 * Conexión a la BB.DD. con patrón Singleton.
 * Las credenciales salen de variables de entorno (.env vía dotenv).
 */
class Database implements DatabaseInterface
{
    private static $instance = null;
    private static $connection;

    private function __construct()
    {
        if (!isset($_ENV['DBHOST'])) {
            die("Añade la variable de entorno DBHOST");
        }
        if (!isset($_ENV['DBUSER'])) {
            die("Añade la variable de entorno DBUSER");
        }
        if (!isset($_ENV['DBPASSWORD'])) {
            die("Añade la variable de entorno DBPASSWORD");
        }
        if (!isset($_ENV['DBNAME'])) {
            die("Añade la variable de entorno DBNAME");
        }
        $this->getConnection();
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    private function getConnection(): void
    {
        $host = $_ENV['DBHOST'];
        $username = $_ENV['DBUSER'];
        $password = $_ENV['DBPASSWORD'];
        $database = $_ENV['DBNAME'];

        try {
        self::$connection = new \mysqli($host, $username, $password, $database);
        } catch (mysqli_sql_exception $e) {
            die("Error SQL: " . $e->getMessage());
        }
    }

    private function __clone()
    {
    }

    public function executeSQL($sql)
    {
        try {
        return self::$connection->query($sql)->fetch_all(MYSQLI_ASSOC);
        } catch (mysqli_sql_exception $e) {
            die("Error SQL: " . $e->getMessage());
            return false;
        }
    }

    public function executeSQLnoreturn($sql)
    {
        try {
        self::$connection->query($sql);
        } catch (mysqli_sql_exception $e) {
            die("Error SQL: " . $e->getMessage());
            return false;
        }
    }

    public function __destruct()
    {
        if (self::$connection != null) {
            self::$connection->close();
        }
    }
}
