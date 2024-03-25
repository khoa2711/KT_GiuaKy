<?php
class Db
{
    protected static $connection;
    public function connect()
    {
        if (!isset(self::$connection)) {
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]);
        }

        if (self::$connection == false) {
            return false;
        }
        return self::$connection;
    }

    public function query_execute($querySting)
    {
        $connection = $this->connect();
        $result = $connection->query($querySting);
        $connection->close();
        return $result;
    }
    public function select_to_array($querySting)
    {
        $rows = array();
        $result = $this->query_execute($querySting);
        if ($result == false) return false;
        while ($item = $result->fetch_assoc()) {
            $rows[] = $item;
        }
        return $rows;
    }
    public function delete($sql) {
        $conn = $this->connect();
        if ($conn->query($sql) === TRUE) {
            echo "Xóa bản ghi thành công";
        } else {
            echo "Lỗi khi xóa bản ghi: " . $conn->error;
        }
        $conn->close();
    }
    
}