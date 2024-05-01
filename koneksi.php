<?php

class Database {
    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'gudang';

    private function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}

class Barang {
    private $conn;

    public function __construct() {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function tambahBarang($nama_barang, $jenis_barang, $jumlah, $lokasi) {
        $sql = "INSERT INTO barang (nama_barang, jenis_barang, jumlah, lokasi) VALUES ('$nama_barang', '$jenis_barang', $jumlah, '$lokasi')";
        if ($this->conn->query($sql) === TRUE) {
            echo "Barang berhasil ditambahkan.<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function hapusBarang($id) {
        $sql = "DELETE FROM barang WHERE id=$id";
        if ($this->conn->query($sql) === TRUE) {
            echo "Barang berhasil dihapus.<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }


}


?>
