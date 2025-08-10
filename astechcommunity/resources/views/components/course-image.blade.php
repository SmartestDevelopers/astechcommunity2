@props(['course', 'class' => 'w-1/1'])

<img class="{{ $class }}" 
     src="{{ $course->image_url }}" 
     alt="{{ $course->title }}" 
     onerror="this.src='{{ asset('template/img/coursesCards/default.png') }}'; this.onerror=null;"
     loading="lazy"
     title="{{ $course->title }}">
