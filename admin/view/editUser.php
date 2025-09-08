<h2>Chỉnh sửa thông tin người dùng</h2>
<form method="POST">
    <label>Vai trò:</label>
    <select name="vaiTro">
        <option value="1" <?= $data['user']['vaiTro'] == 0 ? 'selected' : '' ?>>User</option>
        <option value="2" <?= $data['user']['vaiTro'] == 1 ? 'selected' : '' ?>>Admin</option>
    </select><br>

    <label>Trạng thái:</label>
    <select name="trang_Thai">
        <option value="0" <?= $data['user']['trang_Thai'] == 0 ? 'selected' : '' ?>>Bình thường</option>
        <option value="1" <?= $data['user']['trang_Thai'] == 1 ? 'selected' : '' ?>>Bị chặn</option>
    </select><br>

    <button type="submit" name="submit-edit">Lưu thay đổi</button>
</form>
