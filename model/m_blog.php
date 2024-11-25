<?php
require_once '/xampp/htdocs/Project1_Group-TechZone/model/m_base.php';
$model = new BaseModel();
class m_Blog{
    public $db;
    public function __construct() {
        $baseModel = new BaseModel();
        $this->db = $baseModel->db; 
    }
    public function addBlog($tieuDe, $ma_baiViet) {
        $sql = "INSERT INTO baiviet (tieuDe, ma_baiViet) VALUES (:tieuDe, :ma_baiViet)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':tieuDe' => $tieuDe, ':ma_baiViet' => $ma_baiViet]);
    }
    
    public function updateBlog($ma_baiViet, $tieuDe, $soLuong) {
        $sql = "UPDATE baiviet SET tieuDe = :tieuDe, ma_baiViet = :ma_baiViet WHERE soLuong = :soLuong";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':ma_baiViet' => $ma_baiViet, ':tieuDe' => $tieuDe, ':soLuong' => $soLuong]);
    }
    
    public function deleteBlog($ma_baiViet) {
        $sql = "DELETE FROM baiviet WHERE ma_baiViet = :ma_baiViet";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':ma_baiViet' => $ma_baiViet]);
    }
}