<?php 
namespace models\base;

require_once(__DIR__.'/../../config/db_config.php');
use db\config\db_config;

class model{
    private \PDO $db;
    protected string $table;

    public function __construct(){
        $this->db = db_config::getInstance();
    }

    public function insert(array $data): bool{
        $sql = "INSERT INTO $this->table (";
        $sql .= strtoupper(implode(", ",  array_keys($data)) . ', UPDATEDAT) VALUES (');
        $sql .= "'" . implode("', '", array_values($data)) . "', NOW())";
        try{
            $this->db->query($sql);
            return true;
        }catch(\PDOException $e){
            printf("Error: %s.\n", $e->getMessage());
        }
    }

    public function select(?string $where = null): array{
        $sql = "SELECT * FROM $this->table";
        if($where != null){
            $sql .= " WHERE $where";
        }
        $result = $this->db->query($sql);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

}
?>
