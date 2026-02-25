<?php
$zh = json_decode(file_get_contents('lang/zh.json'), true);
$en = json_decode(file_get_contents('lang/en.json'), true);

$strings = [];

function parseDir($dir)
{
    global $strings;
    $files = glob($dir . '/*');
    foreach ($files as $file) {
        if (is_dir($file)) {
            parseDir($file);
        } else if (preg_match('/\.php$/', $file)) {
            $content = file_get_contents($file);
            preg_match_all("/__\(\s*['\"](.*?)['\"]\s*\)/", $content, $matches);
            foreach ($matches[1] as $match) {
                $strings[$match] = true;
            }
        }
    }
}

parseDir('resources/views');
parseDir('app');

$missing = [];
foreach (array_keys($strings) as $str) {
    if (!isset($zh[$str])) {
        $missing[] = $str;
    }
}

echo "Missing in zh.json:\n";
foreach ($missing as $m) {
    echo "- " . $m . "\n";
}
