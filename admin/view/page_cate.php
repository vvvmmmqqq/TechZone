<?php
require_once '/xampp/htdocs/Project1_Group-TechZone/model/m_base.php';
require_once '/xampp/htdocs/Project1_Group-TechZone/model/m_cate.php';
require_once '/xampp/htdocs/Project1_Group-TechZone/admin/controller/c_cate.php';
$model = new BaseModel();
$data = $model->getAllCategories();
// print_r($data);
 ?>
<div class="category-management">
  <header>
    <h2>Quản lý danh mục</h2>
    <form action="?mod=cate&act=addCate" method="POST" class="danhmuc-form" style="display: flex;">
        <div class="form-group">
            <label for="ten_danhMuc">Tên Danh Mục:</label>
            <input type="text" id="ten_danhMuc" name="ten_danhMuc" required>
        </div>
        <div class="form-group" style="margin: 0px 20px;">
            <label for="ma_danhMuc">Mã Danh Mục:</label>
            <input type="text" id="ma_danhMuc" name="ma_danhMuc" required>
        </div>
        <a href="?mod=cate&act=addCate">
        <button type="submit" class="add-category-btn">+ Thêm danh mục mới</button></a>
    </form>
  </header>
  <div class="category-table">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Tên danh mục</th>
          <th>Số lượng sản phẩm</th>
          <th>Trạng thái</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>

        <?php
        foreach($data as $cate): ?>
        <tr>
          <td><?=$cate["ma_danhMuc"]?></td>
          <td><?=$cate["ten_danhMuc"]?></td>
          <td><?=$cate["soLuong"];
              if($cate["soLuong"] >= 100){
                $trangThai = " Hàng Tồn";
              } elseif($cate['soLuong'] <= 100){
                $trangThai = " Sắp Hết";
              }else{
                $trangThai = "Hết Hàng";
              }
                ?></td>
              <td><?=$trangThai?></td>
          <td>
          <a href="<?=$baseUrl?>/?mod=detailCate&act=detailCate&category_id=<?=$cate["ma_danhMuc"]?>" style="text-decoration:none">
            <button class="edit-btn" id="edit-btn">Sửa</button>
            </a>
            <a href="?mod=cate&act=deleteCate&ma_danhMuc=<?= $cate['ma_danhMuc']?>" >
            <button class="edit-btn" id="edit-btn">Delete</button></a>
          </td>
        </tr>
        <?php endforeach;?>

      </tbody>
    </table>
  </div>
</div>
