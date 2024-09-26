<?php
// models/SongModel.php
class SongModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getTopSongs() {
        $query = "
            SELECT ma_bviet, ten_bhat, hinhanh
            FROM baiviet";

        $result = $this->db->query($query);
    
        if ($result) {
            $songs = $result->fetch_all(MYSQLI_ASSOC);
            return $songs;
        } else {
            return [];
        }
    }
    
}
?>
