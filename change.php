<?php
$user = $_POST['username'];
$newpass = $_POST['newpass'];
$csv = '/var/www/html/users.csv';
$lines = file($csv);
array_shift($lines);

$out = [];
foreach ($lines as $line) {
    $fields = explode(',', trim($line));
    if ($fields[0] === $user) continue;
    $out[] = trim($line);
}
$out[] = "$user,$newpass,---," . date('Y-m-d H:i:s');

file_put_contents($csv, "username,password,otp,time\n" . implode("\n", $out));
header("Location: dashboard.php?u=" . urlencode($user));
exit;
?>
