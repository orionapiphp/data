<?php


namespace OrionApi\Data;

/**
 * Base repository is interface which has one function query. This query returns the output
 * from the database. 
 * 
 * @author Shyam Dubey
 * @since v1.0.0
 * @version v1.0.0
 */
interface BaseRepository
{

    /**
     * Returns the output of the SQL Query. It take one required parameter $sql. Other two parameters ($fetch_type and $multi) are optional. 
     * If $multi = true, the SQL will return multiple rows else it will return only one row.
     * 
     * @author Shyam Dubey
     * @since v1.0.0
     * @version v1.0.0
     */
    function query($sql, $fetch_type, $multi);
}
