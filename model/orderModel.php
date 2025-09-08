<?php
require_once './model/pdo_client.php'; 

class OrderModel
{
    private $db; 

    public function __construct()
    {
        $this->db = new Database(); 
    }

    public function createOrder($ma_donHang, $tongTien, $ngay, $diaChi, $ten_nguoiDung, $soDienThoai, $ma_nguoiDung, $ma_sanPham, $ma_giamGia, $trangThai)
    {
        $sql = "INSERT INTO donhang (ma_donHang, tongTien, ngay, diaChi, ten_nguoiDung, soDienThoai, ma_nguoiDung, ma_sanPham, ma_giamGia, trangThai)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        return $this->db->query($sql, [
            $ma_donHang,
            $tongTien,
            $ngay,
            $diaChi,
            $ten_nguoiDung,
            $soDienThoai,
            $ma_nguoiDung,
            $ma_sanPham,
            $ma_giamGia,
            $trangThai
        ]);
    }
}

?>
