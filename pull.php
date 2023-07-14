<?php
$pull_key = $_GET['key'];

$key_content = file_get_contents('tokens/pull-key.txt');
$key_content = str_replace(PHP_EOL, '', $key_content);

if ($pull_key === $key_content) {
    passthru("sudo git pull");
}
else {
    http_response_code(401);
}