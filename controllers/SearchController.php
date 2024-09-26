<?php
require_once 'models/SearchModel.php';

class SearchController {
    private $model;

    public function __construct($db) {
        $this->model = new SearchModel($db);
    }

    public function search($query) {
        // Lấy dữ liệu từ model
        $songs = $this->model->searchSongs($query);
        // Gửi dữ liệu sang view
        include 'views/search/result.php';
    }
}
?>
