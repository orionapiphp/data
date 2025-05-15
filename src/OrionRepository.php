<?php


namespace OrionApi\Data;

use InvalidArgumentException;
use PDO;

/**
 * This class is useful for executing your queries on the database
 * 
 * @param :pdo Object of PDO class.
 * 
 * @return :row or rows 
 * 
 * @author Shyam Dubey
 * @since v1.0.0 
 * @version v1.0.0 
 */
class OrionRepository implements BaseRepository
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * This function is used for executing the sql queries on the connected database. 
     * You can connect to database by Using DbConfig and DbConnection classes.
     * After Database connection. 
     * 
     * $repo = new OrionRepository($pdo);
     * 
     * $repo->query("SELECT * FROM TABLE_NAME", multi:true);
     * 
     * This will return all the rows in the TABLE_NAME 
     * 
     * @param $sql SQL Query
     * @param $fetch_type PDO::FETCH_ASSOC is default you can use any @link(https://www.php.net/manual/en/book.pdo.php)
     * @param $multi default value is false. When multi is false the return type is single row if you provide :multi = true it 
     * will return array of rows
     * 
     * @author Shyam Dubey
     * @since v1.0.0 
     * @version v1.0.0 
     */
    public function query($sql, $fetch_type = PDO::FETCH_ASSOC, $multi = false)
    {
        if (strlen($sql) == 0) {
            throw new InvalidArgumentException("SQL can not be blank or null.");
        }

        $stmt = $this->pdo->query($sql);
        if ($multi) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $result;
    }
}
