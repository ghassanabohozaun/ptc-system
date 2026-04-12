<!-- begin :statistics cards -->
<div class="row">
    <!-- Employees Card -->
    <div class="col-xl-3 col-lg-6 col-md-6 elite-stat-card-col">
        <div class="elite-stat-card">
            <div class="stat-icon-glow glow-blue">
                <i class="icon-users"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">{!! __('dashboard.employees_count') !!}</span>
                <div class="d-flex align-items-baseline gap-2">
                    <span class="stat-value">{!! employeesCount() !!}</span>
                </div>
                <div class="stat-trend trend-up">
                    <i class="icon-arrow-up"></i> {!! __('dashboard.active_personnel') !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Daily Reports Card -->
    <div class="col-xl-3 col-lg-6 col-md-6 elite-stat-card-col">
        <div class="elite-stat-card">
            <div class="stat-icon-glow glow-orange">
                <i class="icon-pencil"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">{!! __('dashboard.daily_reports_count') !!}</span>
                <div class="d-flex align-items-baseline gap-2">
                    <span class="stat-value">{!! dailyReportsCount() !!}</span>
                </div>
                <div class="stat-trend trend-stable">
                    <i class="icon-check"></i> {!! __('dashboard.todays_updates') !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Reports Card -->
    <div class="col-xl-3 col-lg-6 col-md-6 elite-stat-card-col">
        <div class="elite-stat-card">
            <div class="stat-icon-glow glow-purple">
                <i class="icon-docs"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">{!! __('dashboard.monthly_reports_count') !!}</span>
                <div class="d-flex align-items-baseline gap-2">
                    <span class="stat-value">{!! monthlyReportsCount() !!}</span>
                </div>
                <div class="stat-trend trend-up">
                    <i class="icon-graph"></i> {!! __('dashboard.processed') !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Salaries Card -->
    <div class="col-xl-3 col-lg-6 col-md-6 elite-stat-card-col">
        <div class="elite-stat-card">
            <div class="stat-icon-glow glow-green">
                <i class="icon-wallet"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">{!! __('dashboard.salaries_count') !!}</span>
                <div class="d-flex align-items-baseline gap-2">
                    <span class="stat-value">{!! salariesCount() !!}</span>
                </div>
                <div class="stat-trend trend-up">
                    <i class="icon-energy"></i> {!! __('dashboard.paid_this_month') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end :statistics cards -->

<!-- begin :analytics insights -->
<div class="row">
    <div class="col-xl-8 col-lg-12">
        <div class="card h-100">
            <div class="card-header">
                <h4 class="card-title">{!! __('dashboard.monthly_reports_analytics') !!}</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div id="reports-trends-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card h-100">
            <div class="card-header">
                <h4 class="card-title">{!! __('dashboard.department_distribution') !!}</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div id="dept-distribution-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end :analytics insights -->

