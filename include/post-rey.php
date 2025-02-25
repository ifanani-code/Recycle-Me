<?php
    require_once "Database.php";

class Post extends Database
{
        public function getAllPosts(){
            $query = "SELECT * FROM pengguna";
            $result = $this->conn->query($query);
            $posts =[];
            if($result->num_rows > 0){
            while($row = $result->fetch_object()){
                $posts[] = $row;
        }
    }

    return $posts;
}
public function getrewards()
    {
        $query = "SELECT * FROM rewards";
        $result = $this->conn->query($query);
        $posts = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $posts[] = $row;
            }
        }
        return $posts;
    
    }
    public function showTransaksi($user_id)
    {
        $query = "SELECT * FROM transaksi WHERE user_id = $user_id";
        $result = $this->conn->query($query);
        $posts = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $posts[] = $row;
            }
        }
        return $posts;
    
    }
public function createPost($title,$subtitle,$slug,$content,$image){
    $title = $this->conn->real_escape_string($title);
    $subtitle = $this->conn->real_escape_string($subtitle);
    $slug = $this->conn->real_escape_string($slug);
    $image = $this->conn->real_escape_string($image);

    $query = "INSERT INTO posts (title,subtitle,slug,content,image,created_at,updated_at) VALUES(?,?,?,?,?, NOW(),NOW())";
    $stmt = $this->conn->prepare($query);
    if (! $stmt)return $this->conn->error;

    $stmt->bind_param("sssss", $title, $subtitle, $slug, $content, $image);
    $result = null;
    try{
        $result = $stmt->execute();
    }catch(Exception $e){
        return $e->getMessage();
    }
    if($result === true){
        return true ;
    } else{
        return $stmt->error;
    }
}

public function getPoinUserById($post_id){
    $post_id = $this->conn->real_escape_string($post_id);

    $query = "SELECT poin FROM pengguna WHERE id= ? ";
    $stmt = $this->conn->prepare($query);

    if (! $stmt)return $this->conn->error;
    $stmt->bind_param("i", $post_id,);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result->num_rows == 1) return "Data pos tidak ditemukan";
    
    return $result->fetch_object();
}
public function getPoinHadiahById($post_id){
    $post_id = $this->conn->real_escape_string($post_id);

    $query = "SELECT poin FROM rewards WHERE id= ? ";
    $stmt = $this->conn->prepare($query);

    if (! $stmt)return $this->conn->error;
    $stmt->bind_param("i", $post_id,);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result->num_rows == 1) return "Data pos tidak ditemukan";
    
    return $result->fetch_object();
}

public function updatePoinById($new_poin){
    $query = "UPDATE pengguna SET poin = ?, WHERE id= ?";
    $stmt = $this->conn->prepare($query);

    if (! $stmt)return $this->conn->error;
    $stmt->bind_param("i", $new_poin);

    try{
        $result = $stmt->execute();
        if (!$result){
            return $stmt->error;
        }
        $modifiedRows = $stmt->affected_rows;
        if($modifiedRows > 0){
            return true;
        }else{
            return "Gagal memperbaharaui pos! tidak ada pos yang diperbarui";
        }
    } catch(Exception $e){
        return $e->getMessage();
    }
}

public function deletePostById($post_id)
{
    $query = "DELETE FROM posts WHERE id = ?";
    $stmt = $this->conn->prepare($query);

    if (!$stmt) return $this->conn->error;

    $stmt->bind_param("i",$post_id);
    $result = $stmt->execute();

    if (!$result) return $stmt->error;

    if (!$stmt->affected_rows > 0) return 'Pos tidak ditemukan';

    $stmt->close();
    return true;
}

public function TukarPoin($user_id, $reward_id) {
    $query = "INSERT INTO transaksi (user_id, reward_id, tgl_transaksi) VALUES (?, ?, NOW())";
    $stmt = $this->conn->prepare($query);

    if (!$stmt) return $this->conn->error;

    $stmt->bind_param("ii", $user_id, $reward_id);
    $result = $stmt->execute();

    if (!$result) return $stmt->error;

    if (!$stmt->affected_rows > 0) return 'Pos tidak ditemukan';

    $stmt->close();
    return true;
}
public function UpdatePoin($user_id, $poin) {
    $query = "UPDATE users SET poin = $poin WHERE user_id = $user_id";
    $stmt = $this->conn->prepare($query);

    if (!$stmt) return $this->conn->error;

    // $stmt->bind_param("ii", $user_id, $poin);
    $result = $stmt->execute();

    if (!$result) return $this->conn->error;
    return true;
}
public function getNamaRewardsById($reward_id){
    $reward_id = $this->conn->real_escape_string($reward_id);

    $query = "SELECT nama FROM rewards WHERE id= ? ";
    $stmt = $this->conn->prepare($query);

    if (! $stmt)return $this->conn->error;
    $stmt->bind_param("i", $reward_id,);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result->num_rows == 1) return "Data pos tidak ditemukan";
    
    return $result->fetch_object();
}
}
?>