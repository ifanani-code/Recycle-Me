<?php
require_once "Database.php";




class Edukasi extends Database
{
    /**
     * 
     * 
     * @return array/false [] */   
   
public function getAllPosts()
    {

        $query = "SELECT * FROM edukasi ORDER BY created_at DESC";

        $result = $this->conn->query($query);

        $Edukasi = [];

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_object()) {


                $Edukasi[] = $row;
            }
        }
    
        return $Edukasi;
    }
    public function buatPost($title, $subtitle, $content, $image)
    {
        $title = $this->conn->real_escape_string($title);
        $subtitle = $this->conn->real_escape_string($subtitle);
        
        $content = $this->conn->real_escape_string($content);
        $image = $this->conn->real_escape_string($image);
    
        $query = "INSERT INTO edukasi (title, subtitle, content, image) VALUES (?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        
        if (!$stmt) 
        return $this->conn->error;
    
        $stmt->bind_param("ssss",$title, $subtitle, $content, $image);
        
        $result = null;
        try {
            $result = $stmt->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    
        if ($result == true) {
            return true;
        } else {
            return $stmt->error;
        }
    }
    

    public function getEdukasiById($id)
    {
        // $id = $this->conn->real_escape_string($id);
        $query = "SELECT * FROM edukasi WHERE id =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id,) ;
        $result = $stmt->execute() ;

        $result = $stmt->get_result();

        if (!$result->num_rows == 1) return "Data barang tidak ditemukan";
        return $result->fetch_object();
    }

    public function updateEdukasiById( $id, $new_title, $new_subtitle, $new_content, $new_image)
    {
        $query = "UPDATE edukasi SET title = ?, subtitle = ?, content = ?, image = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
    
        if (!$stmt) return $this->conn->error;
    
        $stmt->bind_param("ssssi", $new_title, $new_subtitle, $new_content, $new_image, $id);
        
        try {
            $result = $stmt->execute();
    
            if (!$result) {
                return $stmt->error;
            }
    
            $modifiedRows = $stmt->affected_rows;
    
            if ($modifiedRows > 0) {
                return true;
            } else {
                return "Gagal memperbarui barang! Tidak ada data yang diperbarui.";
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    

    public function deletePostById($id)
    {
        $query = "DELETE FROM edukasi WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) return $this->conn->error;

        $stmt->bind_param("i", $id);
        $result = $stmt->execute();

        if (!$result) return $this->conn->error;

        if (!$stmt->affected_rows > 0) return 'Data tidak ditemukan';

        $stmt->close();
        return true;
    }
    public function searchEdukasi($keyword)
    {
        $keyword = $this->conn->real_escape_string($keyword);
        
        $query = "SELECT * FROM edukasi WHERE title LIKE '%$keyword%' OR subtitle LIKE '%$keyword%' OR content LIKE '%$keyword%' ";
        
        $result = $this->conn->query($query);
        
        $searchResults = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $searchResults[] = $row;
            }
        }

        return $searchResults;
    }
}

class Berita extends Database
{
    /**
     * 
     * 
     * @return array/false [] */   
   
public function getAllBerita()
    {

        $query = "SELECT * FROM berita ORDER BY created_at DESC";

        $result = $this->conn->query($query);

        $Berita = [];

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_object()) {


                $Berita[] = $row;
            }
        }
    
        return $Berita;
    }

    public function buatBerita($title, $subtitle, $content, $image)
    {
        $title = $this->conn->real_escape_string($title);
        $subtitle = $this->conn->real_escape_string($subtitle);
        $content = $this->conn->real_escape_string($content);
        $image = $this->conn->real_escape_string($image);
    
        $query = "INSERT INTO berita (title, subtitle, content, image) VALUES (?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        
        if (!$stmt) 
        return $this->conn->error;
    
        $stmt->bind_param("ssss",$title, $subtitle, $content, $image);
        
        $result = null;
        try {
            $result = $stmt->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    
        if ($result == true) {
            return true;
        } else {
            return $stmt->error;
        }
    }
    public function getBeritaById($id)
    {
        // $id = $this->conn->real_escape_string($id);
        $query = "SELECT * FROM berita WHERE id_berita =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id) ;
        $result = $stmt->execute() ;

        $result = $stmt->get_result();

        if (!$result->num_rows == 1) return "Data barang tidak ditemukan";
        return $result->fetch_object();
    }

    public function updateBeritaById( $id, $new_title, $new_subtitle, $new_content, $new_image)
    {
        $query = "UPDATE berita SET title = ?, subtitle = ?, content = ?, image = ? WHERE id_berita = ?";
        $stmt = $this->conn->prepare($query);
    
        if (!$stmt) return $this->conn->error;
    
        $stmt->bind_param("ssssi", $new_title, $new_subtitle, $new_content, $new_image, $id);
        
        try {
            $result = $stmt->execute();
    
            if (!$result) {
                return $stmt->error;
            }
    
            $modifiedRows = $stmt->affected_rows;
    
            if ($modifiedRows > 0) {
                return true;
            } else {
                return "Gagal memperbarui barang! Tidak ada data yang diperbarui.";
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteBeritaById($id)
    {
        $query = "DELETE FROM berita WHERE id_berita = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) return $this->conn->error;

        $stmt->bind_param("i", $id);
        $result = $stmt->execute();

        if (!$result) return $this->conn->error;

        if (!$stmt->affected_rows > 0) return 'Data tidak ditemukan';

        $stmt->close();
        return true;
    }

    public function searchBerita($keyword)
    {
        $keyword = $this->conn->real_escape_string($keyword);
        
        $query = "SELECT * FROM berita WHERE title LIKE '%$keyword%' OR subtitle LIKE '%$keyword%' OR content LIKE '%$keyword%' ";
        
        $result = $this->conn->query($query);
        
        $searchResults = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $searchResults[] = $row;
            }
        }

        return $searchResults;
    }
}

?>