<?php


namespace OrionApi\Data;

/**
 * This class is responsible for providing database configuration to the @link{DbConfig} class. 
 * It takes $host, $port, $database_type, $username, $password, $database_name parameters
 * @param :host the Database URL
 * @param :port port on which database can be accessed.
 * @param :database_type [MYSQL, ORACLE, POSTGRES ETC]
 * @param :username database username
 * @param :password database password
 * @param :database_name database name (schema name like orion_api_db)
 * 
 * 
 * @author Shyam Dubey
 * @since v1.0.0 
 * @version v1.0.0 
 */
class DbConfig
{

    private $host;
    private $username;
    private $password;
    private $database_name;
    private $database_type;
    private $port;


    public function __construct($host, $port, $database_type, $username, $password, $database_name)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database_name = $database_name;
        $this->database_type = $database_type;
        $this->port = $port;
    }


    public function get_host()
    {
        return $this->host;
    }

    public function get_username()
    {
        return $this->username;
    }

    public function get_password()
    {
        return $this->password;
    }

    public function get_database_name()
    {
        return $this->database_name;
    }

    public function get_database_type()
    {
        return $this->database_type;
    }

    public function get_port()
    {
        return $this->port;
    }
}
