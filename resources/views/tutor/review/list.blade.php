@extends("layouts.tutor")
@section("title", 'Reviews')

@section('css')
    <style>
        .table td, .table th{
            border-top:  none;
        }
        .btn-primary {
            color: #fff;
            background-color: #5ab48b;
            border-color: #5ab48b;
        }
        .btn-primary:hover{
            color: #fff;
            background-color: #5ab48b;
            border-color: #5ab48b;
        }
        .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #5ab48b;
            border-color: #5ab48b;
        }
    </style>
@endsection

@section('content')
    <div class="inner-column">
        <!-- Edit Profile Info Tabs-->
        <div class="row clearfix">
            <div class="col-md-12">
                <h5 class="mb-3">My Reviews</h5>
                @if($list->count() > 0)
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table data_table">
    	                			<thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student</th>
                                        <th>Rating</th>
                                        <th>Review</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->student->name }}</td>
                                        <td>
                                            <span class="rating-stars">
                                                @for ($i = 0; $i < 5; $i++)
                                                    @if (floor($item->rating) - $i >= 1)
                                                    {{-- Full Star --}}
                                                    <i style="color: #FFC125;" class="fa fa-star"></i>
                                                    @elseif ($item->rating - $i > 0)
                                                    {{-- Half Star --}}
                                                    <i style="color: #FFC125;" class="fa fa-star-half-o"></i>
                                                    @else
                                                    {{-- Empty Star --}}
                                                    <i style="color: #FFC125;" class="fa fa-star-o"></i>
                                                    @endif
                                                @endfor
                                            </span>
                                        </td>
                                        <td>
                                            {{ Str::limit($item->review, 5) }} @if(strlen($item->review) > 5) <a href="javascript:void(0);" title="Read Review" class="read_more_link" data-value="{{ $item->review ?? '' }}">read more</a> @endif
                                        </td>
                                        <td>
                                            <a title="Delete Review" href="javascript:void(0);" data-href="{{ route('tutor.reviews.delete', $item->id) }}" class="btn btn-danger mr-1" id="check-in-location-view"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
    	                        </table>
                            </div>
                            
                        </div>
                    </div>
                @else
                    <div class="no-results">
                        <img src="{{ asset('front/assets/images') }}/no-results.svg" class="img-fluid" alt="">
                        <h2>No Reviews Found</h2>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Delete Lesson Modal Modal -->
    <div class="modal fade" id="sellerLocationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dashboard-section p-0">
                <form action="" method="POST" class="custom-offer-form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="seller-location-body">
                        Are you sure want to delete review ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="" class="delete_btn"><button type="button" class="btn btn-danger">Delete</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="readMoreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dashboard-section p-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="seller-location-body">
                        <p class="text read_more_box">
                            
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // Delete
        $(document).on("click", '#check-in-location-view', function(){
            $url = $(this).attr("data-href");
            $(".delete_btn").attr("href", $url);
            $("#sellerLocationModal").modal("show");
        });

        // Read More
        $(document).on("click", '.read_more_link', function(){
            $des = $(this).attr("data-value");
            $(".read_more_box").html($des);
            $("#readMoreModal").modal("show");
        });
    </script>
@endsection