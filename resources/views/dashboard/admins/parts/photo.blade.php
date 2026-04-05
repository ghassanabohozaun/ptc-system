@php
    $photoUrl = $admin->adminPhoto();
    $colors = ['#5A8DEE', '#FDAC41', '#FF5B5C', '#39DA8A', '#00CFDD', '#7117EA', '#272727'];
    $charIndex = abs(crc32($admin->name)) % count($colors);
    $bgColor = $colors[$charIndex];
@endphp

@if ($photoUrl)
    <img src="{!! $photoUrl !!}" class="rounded-circle"
        style="width: 40px; height: 40px; object-fit: cover; border: 1px solid #ddd;">
@else
    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white"
        style="width: 40px; height: 40px; background-color: {!! $bgColor !!}; border: 1px solid #ddd; font-weight: 600; font-size: 14px; text-transform: uppercase;">
        {!! $admin->initials !!}
    </div>
@endif
