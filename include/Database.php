<?php
/**
 * Kelas database untuk mengelola koneksi database.
 */
class Database
{
    /** @var string host database.  */
    private $host = "localhost";

    /** @var string nama pengguna database */
    private $username = "root";

    /** @var string  kata sandi database */
    private $password = "";

    /** @var string nama database */
    private $dbname = "ass3";
    private $port = "3306";

    /** @var mysqli objek koneksi database */
public $conn;

    /**
    * konstruktor untuk kelas database.
    * 
    * menginisialisasi koneksi database baru dengan
    * jika koneksi gagal,maka akan menghentikan skrip dan menampilkan pesan eror
    */
    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname, $this->port);
        // memeriksa apakah koneksi gagal
        if ($this->conn->connect_errno) {
            die("koneksi gagal: " . $this->conn->connect_error);
        }
    }
}
?>