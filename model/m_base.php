<?php
class BaseModel {
    public $db;

    public function __construct() {
        try {
            $host = 'localhost:3307';
            $dbname = 'techzone';
            $username = 'root'; 
            $password = ''; 
            
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
            $this->db = new PDO($dsn, $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
        }
    }
    
    public function getAllCategories() {
        $stmt = $this->db->prepare("SELECT * FROM danhmuc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllBlog() {
        $stmt = $this->db->prepare("SELECT * FROM baiviet");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsByCategory($ma_danhMuc) {
        $stmt = $this->db->prepare("SELECT * FROM sanpham WHERE ma_danhMuc = :ma_danhMuc");
        $stmt->bindParam(':ma_danhMuc', $ma_danhMuc, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Phương thức để lấy tổng số người dùng
    public function getTotalUsers() {
        $query = "SELECT COUNT(*) AS total_users FROM nguoidung";
        $stmt = $this->db->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_users'];
    }

    // Phương thức để lấy tổng số đơn hàng
    public function getTotalOrders() {
        $query = "SELECT COUNT(*) AS total_orders FROM donhang";
        $stmt = $this->db->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);   
        return $result['total_orders'];
    }
    
    public function generateChartData() {
        $totalUsers = $this->getTotalUsers();
        $totalOrders = $this->getTotalOrders();
        
        return "
        <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
    
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Category', 'Count'],
                ['Users', $totalUsers],
                ['Orders', $totalOrders] 
            ]);
    
            var options = {
                title: 'Thông kê người dùng và đơn hàng',
                is3D: true
            };
    
            var chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);
            
        }
            </script>
        ";
    }
    
}
