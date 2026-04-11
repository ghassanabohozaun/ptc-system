@php
    $statusMap = [
        'new' => [
            'class' => 'bg-light-primary text-primary shadow-pulse',
            'icon' => 'la-bullseye',
            'label' => __('monthlyReports.new')
        ],
        'initial_review' => [
            'class' => 'bg-light-warning text-warning',
            'icon' => 'la-hourglass-half',
            'label' => __('monthlyReports.initial_review')
        ],
        'initial_refuse' => [
            'class' => 'bg-light-danger text-danger',
            'icon' => 'la-times-circle',
            'label' => __('monthlyReports.initial_refuse')
        ],
        'intital_approved' => [
            'class' => 'bg-light-success text-success',
            'icon' => 'la-check-circle',
            'label' => __('monthlyReports.intital_approved')
        ],
        'final_review' => [
            'class' => 'bg-light-warning text-warning pulse-warning',
            'icon' => 'la-user-md', // specific icon for "Doctor" final review
            'label' => __('monthlyReports.final_review')
        ],
        'final_refuse' => [
            'class' => 'bg-light-danger text-danger',
            'icon' => 'la-times-circle',
            'label' => __('monthlyReports.final_refuse')
        ],
        'approved' => [
            'class' => 'bg-light-success text-success',
            'icon' => 'la-award',
            'label' => __('monthlyReports.approved')
        ],
    ];

    $current = $statusMap[$monthlyReport->status] ?? null;
@endphp

@if($current)
    <div class="badge badge-pill badge-glow d-inline-flex align-items-center {{ $current['class'] }} premium-status-badge">
        <i class="la {{ $current['icon'] }} mr-1 premium-status-icon"></i>
        <span>{!! $current['label'] !!}</span>
    </div>
@endif
