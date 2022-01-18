<div class="row teacher-requests-section clearfix">
    <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table data_table">
                          <thead>
                            <tr>
                                <th>#</th>
                                <th>Day</th>
                                <th>Status</th>
                                <th>Time Table</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach(day_dropdown() as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item }}</td>
                                    <td>
                                        @if(getAvailableStatus($item))
                                            <span class="badge badge-success">Available</span>
                                        @else
                                            <span class="badge badge-danger">Not Available</span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        {{-- <a href="javascript:void(0);" title="Edit Time Table" data-title="{{ $item }}" data-type="0" data-href="" class="btn btn-info mr-1 accept_icon_btn" id="accept_icon_btn_one"><i class="fa fa-clock-o"></i></a>
                                        <a href="javascript:void(0);" title="Edit Time Table" data-title="{{ $item }}" data-type="1" data-href="" class="btn btn-warning mr-1 accept_icon_btn" id="accept_icon_btn_two">I am not available</a> --}}
                                        <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Set Time Table
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item accept_icon_btn" href="javascript:void(0);" title="All {{ $item }}" data-title="{{ $item }}" id="accept_icon_btn_one" data-type="0">
                                                    All {{ $item }}
                                                </a>
                                                <a class="dropdown-item accept_icon_btn" href="javascript:void(0);" title="Specific {{ $item }}" data-title="{{ $item }}" data-type="2">
                                                    Specific {{ $item }}
                                                </a>
                                                <a class="dropdown-item accept_icon_btn" href="javascript:void(0);" title="Close {{ $item }}" data-title="{{ $item }}" id="accept_icon_btn_two" data-type="1">
                                                    Close {{ $item }}
                                                </a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>