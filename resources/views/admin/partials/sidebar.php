@php
  $curremtRoute = Route::current()->uri;
@endphp

nav-link @if($currentRoute != 'admin/dashboard') collapsed @endif
nav-link @if($currentRoute != 'admin/student') collapsed @endif