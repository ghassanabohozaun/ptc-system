@php
    $size = $size ?? 40;
    $photoUrl = $admin->adminPhoto();
@endphp

@if ($photoUrl)
    <img src="{!! $photoUrl !!}" class="avatar-circle avatar-size-{!! $size !!}" alt="User">
@else
    <div class="avatar-circle avatar-size-{!! $size !!} d-inline-flex align-items-center justify-content-center text-white text-uppercase"
        style="background-color: {!! $admin->getAvatarColor() !!};">
        {!! $admin->initials !!}
    </div>
@endif
