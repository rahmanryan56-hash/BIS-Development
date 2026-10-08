Class activities  
 
<?php 
 
class Activities { 
 
    static public $database; 
 
    static public function set_database($database) { 
        self::$database = $database; 
    } 
 
    static public function find_by_sql($sql) { 
        $results = self::$database->query($sql); 
        if (!$results) { // add evaluation of the query succeeded or failed 
            exit("Database query failed."); 
        } 
        if ($results) { 
            echo "Database query succeeded. <br>"; 
        } 
        $object_array = []; 
        while ($record = $results->fetch_assoc()) { // get the first row as an array and create an 
object 
            $object_array[] = self::instantiate($record); 
        } 
        return $object_array; 
    } 
 
    static public function find_all() { 
        $sql = "SELECT * FROM Activities"; 
        return self::find_by_sql($sql); 
    } 
 
    static public function find_by_id($id) { 
        $sql = "SELECT * FROM Activities WHERE id='" . self::$database->escape_string($id) . "'"; 
// escape the string 
        $result = self::find_by_sql($sql); 
        if (!empty($result)) { 
            echo "not empty"; 
            return array_shift($result); 
        } else { 
            echo "empty"; 
        } 
    } 
 
    static protected function instantiate($record) { 
        $object = new Activities; 
        foreach ($record as $property => $value) { 
            if (property_exists($object, $property)) { 
                $object->$property = $value; 
            } 
        } 
        return $object; 
    } 
 
    public $ID; 
    public $Name; 
    public $Description; 
    public $Benefits; 
    public $Price; 
} 
 
?>
