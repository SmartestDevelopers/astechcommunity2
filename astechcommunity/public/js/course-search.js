// Course Search Autocomplete
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('course-search');
    const searchResults = document.getElementById('search-results');
    const searchButton = document.getElementById('search-button');
    let searchTimeout;
    
    if (searchInput) {
        // Handle input typing
        searchInput.addEventListener('input', function() {
            const query = this.value.trim();
            
            // Clear previous timeout
            clearTimeout(searchTimeout);
            
            if (query.length < 2) {
                searchResults.style.display = 'none';
                return;
            }
            
            // Debounce search requests
            searchTimeout = setTimeout(() => {
                searchCourses(query);
            }, 300);
        });
        
        // Handle clicking on search button
        searchButton.addEventListener('click', function(e) {
            e.preventDefault();
            const query = searchInput.value.trim();
            if (query) {
                // Get the courses URL from a data attribute or construct it
                const coursesUrl = searchInput.dataset.coursesUrl || '/courses';
                window.location.href = coursesUrl + '?search=' + encodeURIComponent(query);
            }
        });
        
        // Handle Enter key
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const query = this.value.trim();
                if (query) {
                    const coursesUrl = searchInput.dataset.coursesUrl || '/courses';
                    window.location.href = coursesUrl + '?search=' + encodeURIComponent(query);
                }
            }
        });
        
        // Hide results when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                searchResults.style.display = 'none';
            }
        });
    }
    
    function searchCourses(query) {
        const searchUrl = searchInput.dataset.searchUrl || '/api/search-courses';
        
        fetch(searchUrl + '?q=' + encodeURIComponent(query))
            .then(response => response.json())
            .then(courses => {
                displaySearchResults(courses);
            })
            .catch(error => {
                console.error('Search error:', error);
                searchResults.style.display = 'none';
            });
    }
    
    function displaySearchResults(courses) {
        if (courses.length === 0) {
            searchResults.innerHTML = '<div style="padding: 20px; text-align: center; color: #6b7280;">No courses found</div>';
            searchResults.style.display = 'block';
            return;
        }
        
        let html = '';
        courses.forEach(course => {
            const price = course.discount_price && course.discount_price < course.price ? 
                '$' + course.discount_price + ' <span style="text-decoration: line-through; color: #9ca3af;">$' + course.price + '</span>' :
                '$' + course.price;
                
            html += `
                <div class="search-result-item" style="padding: 15px; border-bottom: 1px solid #f3f4f6; cursor: pointer; transition: background-color 0.2s;" onclick="window.location.href='${course.url}'" onmouseover="this.style.backgroundColor='#f9fafb'" onmouseout="this.style.backgroundColor='transparent'">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <div style="flex-shrink: 0;">
                            <img src="/template/img/courses/${course.image}" alt="${course.title}" style="width: 60px; height: 40px; object-fit: cover; border-radius: 6px;" onerror="this.src='/template/img/courses/default.jpg'">
                        </div>
                        <div style="flex: 1; min-width: 0;">
                            <h4 style="font-size: 14px; font-weight: 600; margin: 0 0 5px 0; color: #111827; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">${course.title}</h4>
                            <div style="display: flex; align-items: center; gap: 10px; font-size: 12px; color: #6b7280;">
                                <span>⭐ ${course.rating}</span>
                                <span>•</span>
                                <span>${course.total_students} students</span>
                                <span>•</span>
                                <span>${course.category}</span>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <div style="font-size: 14px; font-weight: 600; color: #059669;">${price}</div>
                            <div style="font-size: 11px; color: #6b7280; margin-top: 2px;">${course.instructor}</div>
                        </div>
                    </div>
                </div>
            `;
        });
        
        // Add 'View All Results' link
        const coursesUrl = searchInput.dataset.coursesUrl || '/courses';
        html += `
            <div style="padding: 15px; text-align: center; border-top: 1px solid #f3f4f6; background-color: #f9fafb;">
                <a href="${coursesUrl}?search=${encodeURIComponent(searchInput.value)}" style="color: #7c3aed; font-weight: 500; text-decoration: none; font-size: 14px;">View all results →</a>
            </div>
        `;
        
        searchResults.innerHTML = html;
        searchResults.style.display = 'block';
    }
});
