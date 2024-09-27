<?php
class SearchModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function searchSongs($query) {
        $likeQuery = '%' . $query . '%';
        $sql = "SELECT ma_bviet, ten_bhat, hinhanh FROM baiviet WHERE ten_bhat LIKE ?";
        $stmt = mysqli_prepare($this->db, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $likeQuery);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $songs = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_stmt_close($stmt);
            return $songs;
        } else {
            return [];
        }
    }
}
?>
