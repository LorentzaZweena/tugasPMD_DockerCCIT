<?php
function writeLog($level, $message, $context = []) {
    $timestamp = date('Y-m-d H:i:s');
    $contextStr = !empty($context) ? json_encode($context) : '';
    $logEntry = "[$timestamp] [$level] $message $contextStr" . PHP_EOL;
    file_put_contents('/var/www/html/app.log', $logEntry, FILE_APPEND | LOCK_EX);
}

// Menulis Log saat Halaman Diakses
writeLog('INFO', 'Halaman diakses!', [
    'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
]);
echo "Log berhasil ditulis!<br>";
?>
