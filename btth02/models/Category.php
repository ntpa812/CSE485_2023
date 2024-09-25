<?php
require_once './configs/db.php'; // Kết nối cơ sở dữ liệu

class Category {
    public $id;
    public $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
}
?>
