<?php
session_start();
$admin_pass = "1010";

// Nếu chưa đăng nhập admin, hiển thị form nhập mật khẩu
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin_pass'])) {
        if ($_POST['admin_pass'] === $admin_pass) {
            $_SESSION['is_admin'] = true;
            header("Location: list_users.php");
            exit;
        } else {
            $error = "Sai mật khẩu quản trị!";
        }
    }
    ?>
    <h2>Đăng nhập quản trị</h2>
    <?php if(!empty($error)) echo "<div style='color:red;'>$error</div>"; ?>
    <form method="post">
        <input type="password" name="admin_pass" placeholder="Mật khẩu admin" required>
        <button type="submit">Vào trang admin</button>
    </form>
    <a href='dashboard.php'>Quay lại trang chính</a>
    <?php
    exit;
}

// Nếu đã đăng nhập admin, hiển thị danh sách tài khoản:
$csv = '/var/www/html/users.csv';
$lines = file($csv);
array_shift($lines);
echo "<h2>Danh sách tài khoản</h2>";
echo "<table border='1' cellpadding='8' style='border-collapse:collapse'>";
echo "<tr><th>STT</th><th>Username</th><th>Password</th><th>Thời gian</th></tr>";
$i = 1;
foreach ($lines as $line) {
    $fields = explode(',', trim($line));
    echo "<tr><td>".$i++."</td>";
    foreach ($fields as $f) echo "<td>".htmlspecialchars($f)."</td>";
    echo "</tr>";
}
echo "</table>";
?>
<br>
<a href="dashboard.php">Quay lại trang chính</a>
<form method="post" style="display:inline;">
    <button type="submit" name="logout" value="1">Đăng xuất admin</button>
</form>
<?php
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: list_users.php");
    exit;
}
?>
