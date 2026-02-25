<?php

$dir = new RecursiveDirectoryIterator('resources/views/admin');
$iterator = new RecursiveIteratorIterator($dir);

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $content = file_get_contents($file->getPathname());

        $pattern = '/onsubmit="return confirm\([^\)]+\)"/';

        if (preg_match($pattern, $content)) {
            $new_content = preg_replace($pattern, 'class="delete-form"', $content);
            file_put_contents($file->getPathname(), $new_content);
            echo "Updated: " . $file->getPathname() . "\n";
        }
    }
}
echo "Done replacing confirm dialogs.\n";
