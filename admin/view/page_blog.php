<?php
require_once '/xampp/htdocs/Project1_Group-TechZone/model/m_base.php';
$model = new BaseModel();
$data = $model->getAllBlog();
// print_r($data);
 ?>
<div class="category-management">
  <header>
    <h2>Quản lý danh mục</h2>
    <form action="?mod=cate&act=addCate" method="POST" class="danhmuc-form" style="display: flex;">
        <div class="form-group">
            <label for="tieuDe">Tiêu Đề:</label>
            <input type="text" id="tieuDe" name="tieuDe" required>
        </div>
        <div class="form-group" style="margin: 0px 20px;">
            <label for="ma_baiViet">Mã Bài Viết:</label>
            <input type="text" id="ma_baiViet" name="ma_baiViet" required>
        </div>
        <a href="?mod=cate&act=addBlog">
        <button type="submit" class="add-category-btn">+ Thêm danh mục mới</button></a>
    </form>
  </header>
  <div class="category-table">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Mô tả</th>
          <th>Tiêu Đề</th>
          <th>Trạng thái</th>
          <th>Ngày Khởi Tạo</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>

        <?php
        foreach($data as $cate): ?>
        <tr>
          <td><?=$cate["ma_baiViet"]?></td>
          <td><?=$cate["moTa"]?></td>
          <td><?=$cate["tieuDe"];?></td>
          <td><?=$cate["trangThai"] == 1? 'Hoạt động' : 'Không hoạt đông';?></td>
          <td><?=$cate["ngayKhoitao"]?></td>
          <td>
          <a href="<?=$baseUrl?>/?mod=detailCate&act=detailCate&category_id=<?=$cate["ma_baiViet"]?>" style="text-decoration:none">
            <button class="edit-btn" id="edit-btn">Sửa</button>
            </a>
            <a href="?mod=blog&act=deleteBlog&ma_baiViet=<?= $cate['ma_baiViet']?>" >
            <button class="edit-btn" id="edit-btn">Delete</button></a>
          </td>
        </tr>
        <?php endforeach;?>

      </tbody>
    </table>
  </div>
</div>
