<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>VCB Digibank — Đăng nhập</title>
    <style>
      body { font-family: Arial; background: #888;}
      .container {margin:70px auto; background:#fff; border-radius:15px; width:370px; padding:40px 35px;}
      .logo { font-weight:bold; font-size:2em; color:green; text-align:center;}
      .subtitle { text-align:center; color:#666;}
      .error { color:red; text-align:center; margin:12px 0; }
      input {width:100%;padding:12px;margin-bottom:12px;border-radius:7px; border:1px solid #ccc;}
      button { width:100%;background:#0a8f3d;color:#fff;padding:12px;border:none;border-radius:7px;font-size:17px;cursor:pointer;}
      button:hover { background:#09682d;}
      .forgot {text-align:center;}
      .forgot a {color:#06c;}
    </style>
</head>
<body>
<div class="container">
    <div class="logo">VCB Digibank</div>
    <div class="subtitle">Kính chào Quý khách</div>
    <?php if(isset($_GET['error'])): ?>
        <div class="error">Sai thông tin đăng nhập!</div>
    <?php endif; ?>
    <form method="post" action="auth.php">
        <input type="text" name="username" placeholder="Tên đăng nhập" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <button type="submit">Đăng nhập</button>
    </form>
    <div class="forgot">
      <a href="login.php">Quay lại trang chính</a>
    </div>
</div>
</body>
</html>
