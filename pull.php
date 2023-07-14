<?php
$pull_key = $_GET['key'];

$key_content = file_get_contents('tokens/pull-key.txt');
$key_content = str_replace(PHP_EOL, '', $key_content);

# Add 'www-data ALL=(root) NOPASSWD:/usr/bin/git' to /etc/sudoers first.
if ($pull_key === $key_content) {
    $output = [];
    exec("sudo git pull", $output);

    $outstr = join("<br>", $output);

    echo '<!DOCTYPE html><html lang="zh-CN"><head><meta charset="utf-8">';
    echo '<title>' . 'Warsic 音乐社团 - 已更新网站' . '</title>';
    echo '</head>';
    echo '<body><p>';
    echo $outstr;
    echo '</p></body></html>';
}
else {
    http_response_code(401);
}