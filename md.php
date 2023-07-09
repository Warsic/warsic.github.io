<?php
$markdown_filename = $_GET['f'];
$load_url = "/load.php?f=" . $markdown_filename;

$header_text = file_get_contents('src/header.html');
$footer_text = file_get_contents('src/footer.html');
$script_text = file_get_contents('src/render.js');

echo '<!DOCTYPE html><html lang="zh-CN"><head><meta charset="utf-8">';
echo '<link rel="stylesheet" type="text/css" href="/styles/purple.css">';
echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.7.0/build/styles/default.min.css">';
echo '<script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.7.0/build/highlight.min.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/markdown-it@13.0.1/dist/markdown-it.min.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/markdown-it-footnote@3.0.3/dist/markdown-it-footnote.min.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/markdown-it-emoji@2.0.2/dist/markdown-it-emoji.min.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/markdown-it-mark@3.0.1/dist/markdown-it-mark.min.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/markdown-it-sup@1.0.0/dist/markdown-it-sup.min.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/markdown-it-sub@1.0.0/dist/markdown-it-sub.min.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/markdown-it-container@3.0.0/dist/markdown-it-container.min.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/markdown-it-deflist@2.1.0/dist/markdown-it-deflist.min.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/markdown-it-abbr@1.0.4/dist/markdown-it-abbr.min.js"></script>';
echo '<script>var mdPath = "' . $load_url . '";</script>';
echo '<title>' . 'Warsic 音乐社团 - ' . $markdown_filename . '</title>';
echo '</head>';
echo '<body class="purple"><div class="container">' . $header_text . '<div class="content"><article id="render-markdown" class="markdown-body entry-content container-lg" itemprop="text">';
echo '</article>';
echo '<script>' . $script_text . '</script>';
echo '</div>' . $footer_text .'</div></body></html>';