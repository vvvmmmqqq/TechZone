<?php
require_once '/xampp/htdocs/Project1_Group-TechZone/model/m_base.php';
$model = new BaseModel();
class m_Category {
    public $db;
    public function __construct() {
        $baseModel = new BaseModel();
        $this->db = $baseModel->db; 
    }
    public function addCategory($ten_danhMuc, $ma_danhMuc) {
        $sql = "INSERT INTO danhmuc (ten_danhMuc, ma_danhMuc) VALUES (:ten_danhMuc, :ma_danhMuc)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':ten_danhMuc' => $ten_danhMuc, ':ma_danhMuc' => $ma_danhMuc]);
    }
    
    public function updateCategory($ma_danhMuc, $ten_danhMuc, $soLuong) {
        $sql = "UPDATE danhmuc SET ten_danhMuc = :ten_danhMuc, ma_danhMuc = :ma_danhMuc WHERE soLuong = :soLuong";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':ma_danhMuc' => $ma_danhMuc, ':ten_danhMuc' => $ten_danhMuc, ':soLuong' => $soLuong]);
    }
    
    public function deleteCategory($ma_danhMuc) {
        $sql = "DELETE FROM sanpham WHERE ma_danhMuc = :ma_danhMuc";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':ma_danhMuc' => $ma_danhMuc]);

        $sql = "DELETE FROM danhmuc WHERE ma_danhMuc = :ma_danhMuc";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':ma_danhMuc' => $ma_danhMuc]);
    }
    public function searchCategory($keyword, $column){
    $sql = "SELECT * FROM danhmuc WHERE $column LIKE ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(["%$keyword%"]);
    $this->db = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
