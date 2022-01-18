<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content dashboard-section p-0">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Lesson Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="seller-location-body">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <td>{{ $lesson->title }}</td>
                        </tr>
                        <tr>
                            <th>Level</th>
                            <td>{{ $lesson->level_from }} - {{ $lesson->level_to }}</td>
                        </tr>
                        <tr>
                            <th>Language</th>
                            <td>{{ $lesson->language }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $lesson->category }}</td>
                        </tr>
                        <tr>
                            <th>Tag</th>
                            <td>{{ $lesson->tag }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                <p class="font-weight-bold ml-2">Packages</p>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Interval</th>
                            <th>Amount</th>
                            <th>Package</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $item)
                            <tr>
                                <td>
                                    @if($item->status=='1')
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-warning">Not Active</span>
                                    @endif
                                </td>
                                <td>{{ $item->interval }}</td>
                                <td>${{ $item->amount_per_interval }}</td>
                                <td>{{ $item->package }} Lessons</td>
                                <td>${{ $item->total_amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>