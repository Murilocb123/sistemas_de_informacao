<?php 
namespace db\config;

class db_config{
    private static ?\PDO $db = null;
    private static string $host = "127.0.0.1";
    private static string $port = "5433";
    private static string $dbname = "aula12";
    private static string $user = "postgres";
    private static string $password = "postgres";
    
    public function __construct(){}

    public static function getInstance(): \PDO {
        if(self::$db == null){
            self::$db = 
            self::$db = new \PDO('pgsql:host='.self::$host.';port='.self::$port.';dbname='.self::$dbname.';user='.self::$user.';password='.self::$password);
        }
        return self::$db;
    }

}
?>