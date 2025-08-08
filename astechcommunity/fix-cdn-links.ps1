# PowerShell script to fix CDN links that were incorrectly modified

$viewsDir = "C:\Users\TOSHIBA\Documents\GitHub\astechcommunity2\astechcommunity\resources\views"

# Get all blade files recursively
$bladeFiles = Get-ChildItem -Path $viewsDir -Filter "*.blade.php" -Recurse

function Fix-CdnLinks {
    param (
        [string]$filePath
    )
    
    Write-Host "Fixing CDN links in $filePath"
    
    # Read the blade file
    $content = Get-Content -Path $filePath -Raw -Encoding UTF8
    
    # Fix CDN links that were incorrectly modified
    $content = $content -replace 'href="\.\.\/\.\.\/\.\.\/cdn\.jsdelivr\.net\/[^"]*\'\)\s*\}\}\"', 'href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css"'
    $content = $content -replace 'href="\.\.\/\.\.\/\.\.\/cdnjs\.cloudflare\.com\/[^"]*\'\)\s*\}\}\"', 'href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"'
    $content = $content -replace 'href="\.\.\/\.\.\/\.\.\/unpkg\.com\/[^"]*\'\)\s*\}\}\"', 'href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"'
    
    # Fix more specific patterns
    $content = $content -replace 'href="../../../cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css\'\) \}\}"', 'href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css"'
    $content = $content -replace 'href="../../../cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css\'\) \}\}"', 'href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"'
    $content = $content -replace 'href="../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css\'\) \}\}"', 'href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"'
    $content = $content -replace 'href="../../../unpkg.com/leaflet%401.7.1/dist/leaflet.css\'\) \}\}"', 'href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"'
    
    # Write the content back to the blade file
    $content | Out-File -FilePath $filePath -Encoding UTF8
}

# Process all blade files
foreach ($file in $bladeFiles) {
    Fix-CdnLinks -filePath $file.FullName
}

Write-Host "CDN links fixing completed!"
Write-Host "Total files processed: $($bladeFiles.Count)"
