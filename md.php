<?php
function curl_raw($url, $content, $token) {
    $accept_header = "Accept: application/vnd.github+json";
    $token_header = "Authorization: Bearer " . $token;
    $version_header = "X-GitHub-Api-Version: 2022-11-28";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array($accept_header, $version_header, $token_header));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $json_response = curl_exec($curl);

    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);

    switch ($status) {
        case 200:  # OK
          break;
        default:
          return "Unexpected HTTP code: " . strval($status) . "\n" . $json_response;
      }

    return $json_response;
}

#$token_text = file_get_contents('tokens/api-token.txt');
#$token_text = str_replace(PHP_EOL, '', $token_text);

$markdown_filename = $_GET['f'];
$load_url = "/load.php?f=" . $markdown_filename;

#$markdown_text = file_get_contents($markdown_filename);

#$render_url = 'https://api.github.com/markdown';

#$request_array['text'] = $markdown_text;
#$request_array['mode'] = 'markdown';

#$html_article_body = curl_raw($render_url, json_encode($request_array), $token_text);
#$html_article_body = $markdown_text;

$header_text = file_get_contents('src/header.html');
$footer_text = file_get_contents('src/footer.html');
$script_text = file_get_contents('src/render.js');

echo '<!DOCTYPE html><html lang="zh-CN"><head><meta charset="utf-8">';
echo '<link rel="stylesheet" type="text/css" href="/styles/purple.css">';
echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.7.0/build/styles/default.min.css">';
echo '<script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.7.0/build/highlight.min.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/markdown-it@13.0.1/dist/markdown-it.min.js"></script>';
echo '<script>var mdPath = "' . $load_url . '";</script>';
echo '<title>' . 'Warsic 音乐社团 - ' . $markdown_filename . '</title>';
echo '</head>';
echo '<body class="purple"><div class="container">' . $header_text . '<div class="content"><article id="render-markdown" class="markdown-body entry-content container-lg" itemprop="text">';
echo '</article>';
echo '<script>' . $script_text . '</script>';
echo '</div>' . $footer_text .'</div></body></html>';