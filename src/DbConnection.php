<?php

namespace OrionApi\Data;

use Exception;
use PDO;

/**
 * Responsible for providing Database Connection Object. 
 * @param $db_config Ojbect of @link{DbConfig} class
 * @return PDO object
 * 
 * @author Shyam Dubey
 * @since v1.0.0 
 * @version v1.0.0 
 */
class DbConnection{


    private DbConfig $db_config;
    private $connection;


    public function __construct(DbConfig $db_config)
    {
        $this->db_config = $db_config;
    }


    public function get_connection(){
        try{
            switch($this->db_config->get_database_type()){
                case "mysql":
                    $dsn = "mysql:host=".$this->db_config->get_host().";dbname=".$this->db_config->get_database_name().";charset=utf8mb4";
                    break;
                case "postgres":
                    $port = $this->db_config->get_port() ?? 5432;
                    $dsn = "pgsql:host=".$this->db_config->get_host().";port=".$port.";dbname=".$this->db_config->get_database_name()."";
                    break;
                case "oracle":
                    $port = $this->db_config->get_port() ?? 1521;
                    $dsn = "oci:dbname=//".$this->db_config->get_host().":".$port."/".$this->db_config->get_database_name()."";
                    break;
                default:
                    throw new Exception("Unsupported database type: ".$this->db_config->get_database_type());
                    
            }
    
            $this->connection = new PDO($dsn, $this->db_config->get_username(), $this->db_config->get_password());
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        }
        catch(Exception $e){
            throw new Exception("Database connection failed ".$e->getMessage());
        }
        
    }
}