<?php
$sourcePath = __DIR__ . '/public/images/mcc-logo.png';
$backupPath = __DIR__ . '/public/images/mcc-logo-heavy.png';

echo "Reading image...\n";
if (!copy($sourcePath, $backupPath)) {
    die("Failed to backup logo.");
}

$sourceImage = imagecreatefrompng($sourcePath);

if (!$sourceImage) {
    die("Failed to create image from source.");
}

$sourceWidth = imagesx($sourceImage);
$sourceHeight = imagesy($sourceImage);

$targetWidth = 500;
$targetHeight = (int) ($sourceHeight * ($targetWidth / $sourceWidth));

echo "Resizing from {$sourceWidth}x{$sourceHeight} to {$targetWidth}x{$targetHeight}...\n";

$targetImage = imagecreatetruecolor($targetWidth, $targetHeight);

// Preserve transparency
imagealphablending($targetImage, false);
imagesavealpha($targetImage, true);
$transparent = imagecolorallocatealpha($targetImage, 255, 255, 255, 127);
imagefilledrectangle($targetImage, 0, 0, $targetWidth, $targetHeight, $transparent);

imagecopyresampled($targetImage, $sourceImage, 0, 0, 0, 0, $targetWidth, $targetHeight, $sourceWidth, $sourceHeight);

echo "Saving image...\n";
// Save with high compression (9 is max for PNG)
imagepng($targetImage, $sourcePath, 9);

imagedestroy($sourceImage);
imagedestroy($targetImage);

echo "New file size: " . round(filesize($sourcePath) / 1024, 2) . " KB\n";
echo "Done.\n";
