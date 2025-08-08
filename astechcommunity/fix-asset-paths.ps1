# PowerShell script to fix asset paths in Blade views

$viewsDir = "C:\Users\TOSHIBA\Documents\GitHub\astechcommunity2\astechcommunity\resources\views"

# Get all blade files recursively
$bladeFiles = Get-ChildItem -Path $viewsDir -Filter "*.blade.php" -Recurse

function Fix-AssetPaths {
    param (
        [string]$filePath
    )
    
    Write-Host "Fixing asset paths in $filePath"
    
    # Read the blade file
    $content = Get-Content -Path $filePath -Raw -Encoding UTF8
    
    # Fix CSS paths
    $content = $content -replace 'href="css/', 'href="{{ asset(''template/css/'
    $content = $content -replace 'href="template/css/', 'href="{{ asset(''template/css/'
    
    # Fix JS paths
    $content = $content -replace 'src="js/', 'src="{{ asset(''template/js/'
    $content = $content -replace 'src="template/js/', 'src="{{ asset(''template/js/'
    
    # Fix IMG paths
    $content = $content -replace 'src="img/', 'src="{{ asset(''template/img/'
    $content = $content -replace 'src="template/img/', 'src="{{ asset(''template/img/'
    
    # Fix file extensions
    $content = $content -replace '\.css"', '.css'') }}"'
    $content = $content -replace '\.js"', '.js'') }}"'
    $content = $content -replace '\.png"', '.png'') }}"'
    $content = $content -replace '\.jpg"', '.jpg'') }}"'
    $content = $content -replace '\.jpeg"', '.jpeg'') }}"'
    $content = $content -replace '\.gif"', '.gif'') }}"'
    $content = $content -replace '\.svg"', '.svg'') }}"'
    
    # Fix double asset calls (in case they were applied twice)
    $content = $content -replace 'asset\(\s*''''\s*template/', 'asset(''template/'
    $content = $content -replace '''''\s*\)\s*\}\}\s*''''\s*\)\s*\}\}', ''') }}'
    
    # Convert common HTML link patterns to Laravel routes
    $content = $content -replace 'href="index\.html"', 'href="{{ url(''/') }}"'
    $content = $content -replace 'data-barba\s+href="index\.html"', 'data-barba href="{{ url(''/') }}"'
    
    # Remove HTML comments about mirroring
    $content = $content -replace '\s*<!--\s*Mirrored\s+from.*?-->\s*', ''
    
    # Write the content back to the blade file
    $content | Out-File -FilePath $filePath -Encoding UTF8
}

# Process all blade files
foreach ($file in $bladeFiles) {
    Fix-AssetPaths -filePath $file.FullName
}

Write-Host "Asset path fixing completed!"
Write-Host "Total files processed: $($bladeFiles.Count)"
