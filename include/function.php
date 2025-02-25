<?php
require_once "database.php";

/**
 * Kelas post untuk mengelola data pos dalam database.
 */

define('baseurl', "http://localhost/Webpro/RecycleMe/");
// "http://localhost/serahlu/Webpro/RecycleMe/"

function url($uri)
{
    return baseurl . $uri;
}

/**
 * Kelas post untuk mengelola data pos dalam database.
 */
class JemputSampah extends Database
{
    /**
     * Mengambil semua data pos dari tabel "jemputsampah"
     * 
     * @return array/false [] Data pos yang ditemukan dalam bentuk array.
     */
    public function getAllJemputSampah($hp)
    {
        $query = "SELECT * FROM jemputsampah where nomorTelepon = '$hp'";

        $result = $this->conn->query($query);

        $jemputsampah = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $jemputsampah[] = $row;
            }
        }
        return $jemputsampah;
    }
    public function getAllJemputSampahId($id)
    {
        $query = "SELECT * FROM jemputsampah where id = $id";

        $result = $this->conn->query($query);

        $jemputsampah = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $jemputsampah[] = $row;
            }
        }
        return $jemputsampah;
    }
    public function getAllJemputSampahA()
    {
        $query = "SELECT * FROM jemputsampah";

        $result = $this->conn->query($query);

        $jemputsampah = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $jemputsampah[] = $row;
            }
        }
        return $jemputsampah;
    }
    public function getJemputSampah($mitra)
    {
        $query = "SELECT * FROM jemputsampah where mitra = '$mitra'";

        $result = $this->conn->query($query);

        $jemputsampah = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $jemputsampah[] = $row;
            }
        }
        return $jemputsampah;
    }
    public function createJemputSampah($nomorTelepon, $alamat, $tanggalPenjemputan, $waktuPenjemputan, $mitra, $catatan, $bskertas, $bsplastik, $bskaca)
    {
        $stmt = $this->conn->prepare("INSERT INTO jemputsampah (nomorTelepon, alamat, tanggalPenjemputan, waktuPenjemputan, mitra, catatan, bskertas, bsplastik, bskaca) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            // Gagal menyiapkan statement
            die("Prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("sssssssss", $nomorTelepon, $alamat, $tanggalPenjemputan, $waktuPenjemputan, $mitra, $catatan, $bskertas, $bsplastik, $bskaca);
        if (!$stmt->execute()) {
            // Gagal menjalankan statement
            die("Execute failed: " . $stmt->error);
        }

        $stmt->close();
        return true;
    }

    public function getJemputSampahByID($id)
    {
        $id = $this->conn->real_escape_string($id);

        $query = "SELECT * FROM jemputsampah WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt)
            return $stmt->error;

        $stmt->bind_param("i", $id, );

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result->num_rows == 1)
            return "Data pesanan tidak ditemukan";

        return $result->fetch_object();

    }
    public function updateJemputSampahById($id, $nomorTelepon, $alamat, $tanggalPenjemputan, $waktuPenjemputan, $catatan, $bskertas, $bsplastik, $bskaca)
    {
        $query = "UPDATE jemputsampah SET nomorTelepon = ?, alamat = ?, tanggalPenjemputan = ?, waktuPenjemputan = ?, catatan = ?, bskertas = ?, bsplastik = ?, bskaca = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt)
            return $stmt->error;
        $stmt->bind_param("ssssssssi", $nomorTelepon, $alamat, $tanggalPenjemputan, $waktuPenjemputan, $catatan, $bskertas, $bsplastik, $bskaca, $id);

        try {
            $result = $stmt->execute();

            if (!$result) {
                return $stmt->error;
            }
            $modifiedRows = $stmt->affected_rows;

            if ($modifiedRows > 0) {
                return true;
            } else {
                return "Gagal memperbaharui form! Tidak ada form yang diperbaharui.";
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function deleteJemputSampahById($id)
    {
        $query = "DELETE FROM jemputsampah WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt)
            return $this->conn->error;

        $stmt->bind_param("i", $id);
        $result = $stmt->execute();

        if (!$result)
            return $stmt->error;

        if (!$stmt->affected_rows > 0)
            return 'Pesanan tidak ditemukan';

        $stmt->close();
        return true;
    }
    public function updateBuktiById($id, $gambar, $namakurir)
    {
        $query = "UPDATE jemputsampah SET gambar = ?, namakurir = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt)
            return $stmt->error;
        $stmt->bind_param("ssi", $gambar, $namakurir, $id);

        try {
            $result = $stmt->execute();

            if (!$result) {
                return $stmt->error;
            }
            $modifiedRows = $stmt->affected_rows;

            if ($modifiedRows > 0) {
                return true;
            } else {
                return "Gagal memperbaharui form! Tidak ada form yang diperbaharui.";
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function updatePoinById($id, $poin)
    {
        $query = "UPDATE jemputsampah SET poin = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt)
            return $stmt->error;
        $stmt->bind_param("si", $poin, $id);

        try {
            $result = $stmt->execute();

            if (!$result) {
                return $stmt->error;
            }
            $modifiedRows = $stmt->affected_rows;

            if ($modifiedRows > 0) {
                return true;
            } else {
                return "Gagal memperbaharui form! Tidak ada form yang diperbaharui.";
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

class jenisSampah extends Database {
    public function getAllJenisSampah()
    {
        $query = "SELECT * FROM jenissampah";

        $result = $this->conn->query($query);

        $jenissampah = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $jenissampah[] = $row;
            }
        }
        return $jenissampah;
    }
}

class poinjenissampah extends Database {
    public function getAllPoinSampah()
    {
        $query = "SELECT * FROM poinjenissampah";

        $result = $this->conn->query($query);

        $poinjenissampah = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $poinjenissampah[] = $row;
            }
        }
        return $poinjenissampah;
    }
}
