<?php
$user = $_POST['username'];
$pass = $_POST['password'];
$csv = '/var/www/html/users.csv';
$lines = file($csv);
array_shift($lines);

$ok = false;
foreach ($lines as $line) {
    $fields = explode(',', trim($line));
    if ($user === $fields[0] && $pass === $fields[1]) {
        $ok = true; break;
    }
}
if ($ok) {
    header("Location: dashboard.php?u=" . urlencode($user));
    exit;
} else {
    header("Location: login.php?error=1");
    exit;
}
?>

