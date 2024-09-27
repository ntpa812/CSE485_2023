<?php
class AdminService {
    public function getStatistics() {
        include './configs/db.php'; // Kết nối CSDL

        // Đếm số lượng thể loại
        $sql_theloai = "SELECT COUNT(ma_tloai) AS count_theloai FROM theloai";
        $result_theloai = $db->query($sql_theloai);
        $count_theloai = $result_theloai->fetch_assoc()['count_theloai'];

        // Đếm số lượng tác giả
        $sql_tacgia = "SELECT COUNT(ma_tgia) AS count_tacgia FROM tacgia";
        $result_tacgia = $db->query($sql_tacgia);
        $count_tacgia = $result_tacgia->fetch_assoc()['count_tacgia'];

        // Đếm số lượng bài viết
        $sql_baiviet = "SELECT COUNT(ma_bviet) AS count_baiviet FROM baiviet";
        $result_baiviet = $db->query($sql_baiviet);
        $count_baiviet = $result_baiviet->fetch_assoc()['count_baiviet'];

        // Đếm số lượng người dùng
        $sql_users = "SELECT COUNT(user_id) AS count_users FROM users";
        $result_users = $db->query($sql_users);
        $count_users = $result_users->fetch_assoc()['count_users'];

        return [
            'categories' => $count_theloai,
            'authors' => $count_tacgia,
            'articles' => $count_baiviet,
            'users' => $count_users
        ];
    }
}
