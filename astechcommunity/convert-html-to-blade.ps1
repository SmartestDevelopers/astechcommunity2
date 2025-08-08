# PowerShell script to convert HTML files to Laravel Blade views

$sourceDir = "C:\Users\TOSHIBA\Documents\GitHub\astechcommunity2\astechcommunity\public\template"
$viewsDir = "C:\Users\TOSHIBA\Documents\GitHub\astechcommunity2\astechcommunity\resources\views"

# Course related files
$courseFiles = @(
    "courses-list-1.html", "courses-list-2.html", "courses-list-3.html", 
    "courses-list-4.html", "courses-list-5.html", "courses-list-6.html",
    "courses-list-7.html", "courses-list-8.html", "courses-list-9.html", 
    "courses-list-all.html", "courses-single-1.html", "courses-single-2.html",
    "courses-single-3.html", "courses-single-4.html", "courses-single-5.html", 
    "courses-single-6.html"
)

# Dashboard related files
$dashboardFiles = @(
    "dashboard.html", "dshb-dashboard.html", "dshb-courses.html", 
    "dshb-bookmarks.html", "dshb-listing.html", "dshb-reviews.html",
    "dshb-settings.html", "dshb-administration.html", "dshb-assignment.html", 
    "dshb-calendar.html", "dshb-dictionary.html", "dshb-forums.html",
    "dshb-grades.html", "dshb-messages.html", "dshb-participants.html", 
    "dshb-quiz.html", "dshb-survey.html"
)

# Regular page files
$pageFiles = @(
    "home-2.html", "home-3.html", "home-4.html", "home-5.html", 
    "home-6.html", "home-7.html", "home-8.html", "home-9.html", 
    "home-10.html", "about-1.html", "about-2.html", "contact-1.html", 
    "contact-2.html", "blog-list-1.html", "blog-list-2.html", 
    "blog-list-3.html", "blog-single.html", "instructor-become.html", 
    "instructors-become.html", "instructors-list-1.html", "instructors-list-2.html", 
    "instructors-single.html", "event-list-1.html", "event-list-2.html", 
    "event-single.html", "lesson-single-1.html", "lesson-single-2.html", 
    "login.html", "signup.html", "404.html", "cover-1.html", 
    "video-1.html", "pricing.html", "terms.html", "help-center.html", 
    "ui-elements.html", "shop-list.html", "shop-single.html", 
    "shop-cart.html", "shop-checkout.html", "shop-order.html"
)

function Convert-HtmlToBlade {
    param (
        [string]$sourceFile,
        [string]$destFile
    )
    
    Write-Host "Converting $sourceFile to $destFile"
    
    # Read the HTML file
    $content = Get-Content -Path $sourceFile -Raw -Encoding UTF8
    
    # Basic transformations for Laravel Blade
    # Fix asset paths - change relative paths to Laravel asset() function
    $content = $content -replace 'href="css/', 'href="{{ asset(''template/css/'
    $content = $content -replace 'src="js/', 'src="{{ asset(''template/js/'
    $content = $content -replace 'src="img/', 'src="{{ asset(''template/img/'
    $content = $content -replace '\.css"', '.css'') }}"'
    $content = $content -replace '\.js"', '.js'') }}"'
    
    # Fix image paths in content
    $content = $content -replace 'src="img/', 'src="{{ asset(''template/img/'
    $content = $content -replace '\.png"', '.png'') }}"'
    $content = $content -replace '\.jpg"', '.jpg'') }}"'
    $content = $content -replace '\.jpeg"', '.jpeg'') }}"'
    $content = $content -replace '\.gif"', '.gif'') }}"'
    $content = $content -replace '\.svg"', '.svg'') }}"'
    
    # Convert HTML links to Laravel routes (basic conversion)
    $content = $content -replace 'href="index\.html"', 'href="{{ route(''home'') }}"'
    $content = $content -replace 'href="about-1\.html"', 'href="{{ route(''pages.about-1'') }}"'
    $content = $content -replace 'href="about-2\.html"', 'href="{{ route(''pages.about-2'') }}"'
    $content = $content -replace 'href="contact-1\.html"', 'href="{{ route(''pages.contact-1'') }}"'
    $content = $content -replace 'href="contact-2\.html"', 'href="{{ route(''pages.contact-2'') }}"'
    $content = $content -replace 'href="courses\.html"', 'href="{{ route(''courses'') }}"'
    $content = $content -replace 'href="blog\.html"', 'href="{{ route(''blog'') }}"'
    $content = $content -replace 'href="login\.html"', 'href="{{ route(''login'') }}"'
    $content = $content -replace 'href="signup\.html"', 'href="{{ route(''register'') }}"'
    
    # Remove HTML comments about mirroring
    $content = $content -replace '\s*<!-- Mirrored from.*?-->', ''
    
    # Write the content to the blade file
    $content | Out-File -FilePath $destFile -Encoding UTF8
}

# Process course files
foreach ($file in $courseFiles) {
    $sourcePath = Join-Path $sourceDir $file
    $destPath = Join-Path "$viewsDir\courses" ($file -replace '\.html$', '.blade.php')
    
    if (Test-Path $sourcePath) {
        Convert-HtmlToBlade -sourceFile $sourcePath -destFile $destPath
    }
}

# Process dashboard files  
foreach ($file in $dashboardFiles) {
    $sourcePath = Join-Path $sourceDir $file
    $destPath = Join-Path "$viewsDir\dashboard" ($file -replace '\.html$', '.blade.php')
    
    if (Test-Path $sourcePath) {
        Convert-HtmlToBlade -sourceFile $sourcePath -destFile $destPath
    }
}

# Process page files
foreach ($file in $pageFiles) {
    $sourcePath = Join-Path $sourceDir $file
    $destPath = Join-Path "$viewsDir\pages" ($file -replace '\.html$', '.blade.php')
    
    if (Test-Path $sourcePath) {
        Convert-HtmlToBlade -sourceFile $sourcePath -destFile $destPath
    }
}

Write-Host "HTML to Blade conversion completed!"
Write-Host "Total files processed: $($courseFiles.Count + $dashboardFiles.Count + $pageFiles.Count)"
