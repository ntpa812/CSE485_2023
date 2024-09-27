<?php
require_once './configs/db.php'; // Kết nối cơ sở dữ liệu

class SongModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Lấy danh sách bài viết dựa trên tên thể loại
    public function getSongsByCategory($categoryName) {
        $query = "SELECT 
                    bv.ma_bviet, 
                    bv.tieude, 
                    bv.ten_bhat, 
                    bv.ngayviet, 
                    tg.ten_tgia
                  FROM 
                    baiviet bv
                  JOIN 
                    theloai tl ON bv.ma_tloai = tl.ma_tloai
                  JOIN 
                    tacgia tg ON bv.ma_tgia = tg.ma_tgia
                  WHERE 
                    tl.ten_tloai = :categoryName";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':categoryName', $categoryName);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
