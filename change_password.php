<?php $user = $_GET['u'] ?? ''; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đổi mật khẩu</title>
</head>
<body>
    <h2>Đổi mật khẩu cho tài khoản: <b><?= htmlspecialchars($user) ?></b></h2>
    <form method="post" action="change.php">
        <input type="hidden" name="username" value="<?= htmlspecialchars($user) ?>">
        <label>Mật khẩu mới:</label>
        <input type="password" name="newpass" required>
        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
