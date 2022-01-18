<form action="" method="GET" class="filter-form">
    <input type="hidden" name="filter" value="applied">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" name="from_date" class="form-control datepicker readonly" autocomplete="off" readonly placeholder="From date" value="{{ request()->from_date }}" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" name="to_date" class="form-control datepicker readonly" autocomplete="off" readonly placeholder="To date" value="{{ request()->to_date }}" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <button type="button" class="btn btn-danger btn-sm bold float-right btn_clear_filter" type="button">
                Clear
            </button>
            <button type="submit" class="btn btn-warning btn-sm bold float-right " type="button">
                Filter
            </button>
        </div>
    </div>
</form>