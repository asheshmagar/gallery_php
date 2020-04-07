<?php
class DbObject
{
    protected static $db_table = "users";
    public static function findAllByID()
    {
        return self::findQuery("SELECT * FROM " .static::$db_table ." ");
    }
    public static function findByID($userId)
    {
        global $database;
        $resultArray = static::findQuery("SELECT * FROM " .static::$db_table ."  WHERE id = $userId LIMIT 1");


        return !empty($resultArray) ? array_shift($resultArray) : false;

    }
    public static function findQuery($sql)
    {
        global $database;

        $resultSet = $database->query($sql);
        $theObjectArray = array();
        while ($row = mysqli_fetch_array($resultSet)) {
            $theObjectArray[] = static::instantiation($row);
        }
        return $theObjectArray;
    }

    public static function instantiation($theRecord)
    {
        $callingClass = get_called_class();
        $theObject = new $callingClass;


        foreach ($theRecord as $theAttribute => $value) {
            if ($theObject->hasTheAttribute($theAttribute)) {
                $theObject->$theAttribute = $value;
            }
        }

        return $theObject;
    }

    private function hasTheAttribute($theAttribute)
    {

        $objectProperties = get_object_vars($this);

        return array_key_exists($theAttribute, $objectProperties);
    }
    protected function properties()
    {
        $properties = array();
        foreach (static::$db_table_fields as $db_field) {
            if (property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
    }

    protected function clean_properties()
    {
        global $database;
        $clean_properties = array();
        foreach ($this->properties() as $key=>$value) {
            $clean_properties[$key]=$database->escapeString($value);
        }
        return $clean_properties;
    }
    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();

    }

    public function update()
    {
        global $database;

        $properties = $this->clean_properties();
        $properties_pairs = array();
        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key} ='{$value}'";
        }
        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id= " . $database->escapeString($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }


    public function create()
    {
        global $database;
        $properties = $this->clean_properties();
        $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
        $sql .= " VALUES ('" . implode("','", array_values($properties)) . "')";


        if ($database->query($sql)) {
            $this->id = $database->idInsert();
            return true;
        } else {
            return false;
        }


    }//end of update method

    public function delete()
    {
        global $database;
        $sql = "DELETE FROM " . static::$db_table . " WHERE ";
        $sql .= " id = " . $database->escapeString($this->id);
        $sql .= " LIMIT 1";
        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    }
}