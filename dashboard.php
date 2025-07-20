<?php $user = $_GET['u'] ?? 'Ẩn danh'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>VCB Digibank - Trang chính</title>
    <style>
      body { font-family: Arial; background: #888;}
      .container {margin:80px auto; background:#fff; border-radius:15px; width:420px; padding:40px 40px;}
      .logo { font-weight:bold; font-size:2em; color:green; text-align:center;}
      .subtitle { text-align:center; margin-bottom:20px;}
      .btns button {width:100%;margin:7px 0;padding:13px;background:#0a8f3d;color:#fff;font-size:17px;border:none;border-radius:7px;cursor:pointer;}
      .btns button:hover {background:#09682d;}
      .btns form {margin:0;}
      .logout {margin-top:17px;text-align:center;}
    </style>
</head>
<body>
<div class="container">
    <div class="logo">VCB Digibank</div>
    <div class="subtitle">Xin chào <strong><?= htmlspecialchars($user) ?></strong></div>
    <div class="btns">
      <form method="get" action="change_password.php">
        <input type="hidden" name="u" value="<?= htmlspecialchars($user) ?>">
        <button type="submit">Đổi mật khẩu</button>
      </form>

	<form method="get" action="chuyentien.html">
        <input type="hidden">
        <button type="submit">Chuyển tiền</button>
      </form>

          <form method="get" action="login.php">
        <button type="submit">Đăng xuất</button>
      </form>
    </div>
</div>
</body>
</html>
