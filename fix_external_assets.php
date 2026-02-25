<?php

$dir = new RecursiveDirectoryIterator('resources/views');
$iterator = new RecursiveIteratorIterator($dir);

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $content = file_get_contents($file->getPathname());
        $changed = false;

        // Replace Alpine.js unpkg with jsdelivr
        if (strpos($content, 'unpkg.com/alpinejs') !== false) {
            $content = str_replace('https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js', 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js', $content);
            $changed = true;
        }

        // Replace Google Fonts with loli proxy
        if (strpos($content, 'fonts.googleapis.com') !== false) {
            $content = str_replace('fonts.googleapis.com', 'fonts.loli.net', $content);
            $changed = true;
        }

        // Replace Unsplash images with local logo
        if (strpos($content, 'images.unsplash.com') !== false) {
            // We use regex to replace the entire unsplash url with the asset url
            $content = preg_replace('/https:\/\/images\.unsplash\.com\/[^\'"]+/', '{{ asset(\'images/mcc-logo.png\') }}', $content);
            $changed = true;
        }

        if ($changed) {
            file_put_contents($file->getPathname(), $content);
            echo "Updated: " . $file->getPathname() . "\n";
        }
    }
}
echo "Done replacing external resources.\n";

