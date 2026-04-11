<div class="d-flex justify-content-center align-items-center mb-0">
    <div class="btn-group" role="group">
        <!-- Show Details (Modal) -->
        <a href="javascript:void(0)" class="btn-premium-action btn-premium-action-success mr-1 details-control"
            title="{!! __('dailyReports.show_details') !!}">
            <i class="la la-info-circle"></i>
        </a>

        <!-- Edit (Page) -->
        <a href="{!! route('dashboard.dailyReports.edit', $dailyReport->id) !!}" class="btn-premium-action btn-premium-action-edit mr-1"
            title="{!! __('general.edit') !!}">
            <i class="la la-edit"></i>
        </a>

        <!-- Delete -->
        <a href="javascript:void(0)" class="btn-premium-action btn-premium-action-danger delete-confirm"
            data-id="{!! $dailyReport->id !!}" data-route="{!! route('dashboard.daliy.reports.destroy') !!}" data-title="{!! __('general.ask_delete_record') !!}"
            data-text="{!! __('general.delete_warning_text') !!}" data-confirm-btn="{!! __('general.yes') !!}"
            data-cancel-btn="{!! __('general.no') !!}" data-success-title="{!! __('general.deleted') !!}"
            data-success-text="{!! __('general.delete_success_message') !!}" title="{!! __('general.delete') !!}">
            <i class="la la-trash"></i>
        </a>
    </div>
</div>
