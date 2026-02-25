param([string]$ImagePath, [int]$TargetWidth)

Add-Type -AssemblyName System.Drawing

try {
    $img = [System.Drawing.Image]::FromFile($ImagePath)
    $TargetHeight = [math]::Round(($img.Height * $TargetWidth) / $img.Width)
    
    $bmp = New-Object System.Drawing.Bitmap $img, $TargetWidth, $TargetHeight
    
    # Save optimized image
    $bmp.Save($ImagePath.Replace("-heavy.png", ".png"), [System.Drawing.Imaging.ImageFormat]::Png)
    
    $img.Dispose()
    $bmp.Dispose()
    Write-Host "Successfully resized to $TargetWidth x $TargetHeight"
} catch {
    Write-Host "Error: $_"
}
