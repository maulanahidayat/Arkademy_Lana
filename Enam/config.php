<?php
class config {

    public $server = 'localhost';
    public $username = 'root';
    public $database = 'db_maulana_enam';
    public $password = '';
    public $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->server;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function get($sql, $fetch = PDO::FETCH_ASSOC)
    {
        $query = $this->connection->query($sql);
        return $query->fetchAll($fetch);
    }

    public function first($sql, $fetch = PDO::FETCH_OBJ)
    {
        $query = $this->connection->query($sql);
        return $query->fetch($fetch);
    }

    public function create($sql, $data)
    {
        $query = $this->connection->prepare($sql);
        $query->execute($data);
    }

    public function update($sql, $data)
    {
        $query = $this->connection->prepare($sql);
        $query->execute($data);
    }

    public function delete($sql, $data)
    {
        $query = $this->connection->prepare($sql);
        $query->execute($data);
    }

    /**
     * Instance
     */
    public function getAllTransaksi() {
        $query = $this->connection->query('SELECT * FROM transaksi_view ORDER BY id ASC');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}