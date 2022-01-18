@extends("layouts.tutor")
@section("title", 'Lessons')

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
                <h5 class="mb-3">My Lessons</h5>
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix mb-4">
                            <a href="{{ route('tutor.lesson.add') }}" class="button-sm pull-right"><span class="txt">Add Lesson</span></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table data_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Language</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lesson_list as $lesson)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $lesson->title }}</td>
                                            <td>{{ $lesson->language }}</td>
                                            <td>{{ $lesson->category }}</td>
                                            <td>
                                                @if($lesson->availability == '0')
                                                    <span class="badge badge-warning">Not Active</span>
                                                @elseif($lesson->availability == '1')
                                                    <span class="badge badge-success">Active</span>
                                                @endif
                                            </td>
                                            <td class="d-flex">
                                                <a title="Detail" href="javascript:void(0);" data-href="{{ route('tutor.lesson.detail', $lesson->id) }}" class="btn btn-info mr-1" id="lesson-eye"><i class="fa fa-eye"></i></a>
                                                @if($lesson->availability == '1')
                                                    <a title="Activate" href="{{ route('tutor.lesson.change_status', $lesson->id) }}" data-href="" class="btn btn-success mr-1"><i class="fa fa-check"></i></a>
                                                @endif
                                                @if($lesson->availability == '0')
                                                    <a title="Deactivate" href="{{ route('tutor.lesson.change_status', $lesson->id) }}" data-href="" class="btn btn-danger mr-1"><i class="fa fa-times"></i></a>
                                                @endif
                                                <a title="Edit" href="{{ route('tutor.lesson.edit', $lesson->id) }}" class="btn btn-primary mr-1"><i class="fa fa-pencil"></i></a>
                                                {{-- <a title="Delete" href="javascript:void(0);" data-href="{{ route('tutor.lesson.delete', $lesson->id) }}" class="btn btn-danger mr-1" id="check-in-location-view"><i class="fa fa-trash"></i></a> --}}
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
    </div>

    <!-- Delete Lesson Modal Modal -->
    <div class="modal fade" id="sellerLocationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dashboard-section p-0">
                <form action="" method="POST" class="custom-offer-form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Lesson</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="seller-location-body">
                        Are you sure want to delete ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="" class="delete_btn"><button type="button" class="btn btn-danger">Delete</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Lesson Detail -->
    <div class="modal fade" id="lessonDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        
    </div>
@endsection

@section('js')
    <script>
        $(document).on("click", '#check-in-location-view', function(){
            $url = $(this).attr("data-href");
            $(".delete_btn").attr("href", $url);
            $("#sellerLocationModal").modal("show");
        });

        $(document).on("click", '#lesson-eye', function(){
            $url = $(this).attr("data-href");
            getLessonDetail($url);
        });

        function getLessonDetail($url)
        {
            $.ajax({
                type: "GET",
                url: $url,
                success: function (response) {
                    $('#lessonDetailModal').html(response);
                    $("#lessonDetailModal").modal("show");
                }
            });
        }
    </script>
@endsection