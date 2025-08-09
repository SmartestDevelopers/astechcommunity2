<?php

if (!function_exists('getImageUrl')) {
    /**
     * Get a safe image URL with fallback to placeholder
     *
     * @param string|null $imagePath
     * @param string $type
     * @param string $fallbackText
     * @param string $size
     * @return string
     */
    function getImageUrl($imagePath, $type = 'course', $fallbackText = '', $size = '400x300')
    {
        // Handle different image path formats
        if (!empty($imagePath)) {
            // If it's a full URL, return it
            if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
                return $imagePath;
            }
            
            // Check if image exists in storage
            if (file_exists(storage_path('app/public/' . $imagePath))) {
                return asset('storage/' . $imagePath);
            }
            
            // Check if image exists in public folder  
            if (file_exists(public_path($imagePath))) {
                return asset($imagePath);
            }
            
            // Check if it already has storage/ prefix
            if (strpos($imagePath, 'storage/') === 0 && file_exists(public_path($imagePath))) {
                return asset($imagePath);
            }
        }
        
        // Generate placeholder based on type
        switch ($type) {
            case 'course':
                $bgColor = '007bff';
                $textColor = 'ffffff';
                $defaultText = $fallbackText ?: 'Course Image';
                break;
            case 'instructor':
            case 'user':
                $bgColor = '6c757d';
                $textColor = 'ffffff';
                $defaultText = $fallbackText ?: 'User';
                break;
            case 'blog':
                $bgColor = '28a745';
                $textColor = 'ffffff';
                $defaultText = $fallbackText ?: 'Blog Post';
                break;
            case 'event':
                $bgColor = 'ffc107';
                $textColor = '212529';
                $defaultText = $fallbackText ?: 'Event';
                break;
            default:
                $bgColor = 'e9ecef';
                $textColor = '6c757d';
                $defaultText = $fallbackText ?: 'Image';
        }
        
        return "https://via.placeholder.com/{$size}/{$bgColor}/{$textColor}?text=" . urlencode($defaultText);
    }
}

if (!function_exists('getAvatarUrl')) {
    /**
     * Get a safe avatar URL with fallback to UI avatars
     *
     * @param string|null $imagePath
     * @param string $name
     * @param string $size
     * @return string
     */
    function getAvatarUrl($imagePath, $name = '', $size = '150')
    {
        // Handle different image path formats
        if (!empty($imagePath)) {
            // If it's a full URL, return it
            if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
                return $imagePath;
            }
            
            // Check if image exists in storage
            if (file_exists(storage_path('app/public/' . $imagePath))) {
                return asset('storage/' . $imagePath);
            }
            
            // Check if image exists in public folder  
            if (file_exists(public_path($imagePath))) {
                return asset($imagePath);
            }
            
            // Check if it already has storage/ prefix
            if (strpos($imagePath, 'storage/') === 0 && file_exists(public_path($imagePath))) {
                return asset($imagePath);
            }
        }
        
        $name = $name ?: 'User';
        return "https://ui-avatars.com/api/?name=" . urlencode($name) . "&size={$size}&background=007bff&color=fff&rounded=true";
    }
}
