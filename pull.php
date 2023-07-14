<?php
$pull_key = $_GET['key'];

$key_content = file_get_contents('tokens/pull-key.txt');
$key_content = str_replace(PHP_EOL, '', $key_content);

if ($pull_key === $key_content) {
    echo '<!DOCTYPE html><html lang="zh-CN"><head><meta charset="utf-8">';
    echo '<title>' . 'Warsic 音乐社团 - 已更新网站' . '</title>';
    echo '</head>';
    echo '<body>';
    echo exec("sudo git pull");
    echo '</body></html>';
}
else {
    http_response_code(401);
}