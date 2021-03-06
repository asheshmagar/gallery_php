<?php


class User extends DbObject
{
    protected static $db_table_fields = array("username", "password", "first_name", "last_name");

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function verifyUser($username, $password)
    {
        global $database;
        $username = $database->escapeString($username);
        $password = $database->escapeString($password);

        $sql = "SELECT * FROM " .self::$db_table ." WHERE ";
        $sql .= "username  = '{$username}' ";
        $sql .= "AND password  = '{$password}' ";
        $sql .= "LIMIT 1";
        $resultArray = self::findQuery($sql);
        return !empty($resultArray) ? array_shift($resultArray) : false;

    }


} //end of the user class




















