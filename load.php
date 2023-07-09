<?php
$markdown_filename = $_GET['f'];
$markdown_text = file_get_contents($markdown_filename);

echo $markdown_text;