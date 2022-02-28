@extends('front-end.layouts.app')
@section('content')

    <style>
        .ans-flex-between{
            display: flex;
            justify-content: space-between;
        }
        .ans-course-id{
            font-size: 15px;
            margin-bottom: 5px;
        }
        .ans-course-duration{
            font-size: 15px;
            margin-bottom: 5px;
        }
        .ans-institution-name{
            font-size: 15px;
            margin-bottom: 0px;
            text-align: left;
        }
        .ans-flex-justify-center{
            display: flex;
            justify-content: center;
            border-top: 1px solid #eeeeee;
            margin-top: 10px;
            padding: 10px 0;
        }
        .ans-flex-justify-center a{
            font-size: 15px;
            display: inline-block;
            position: relative;
            height: 40px;
            width: 40px;
            line-height: 40px;
            border: 1px solid #eeeeee;
            border-radius: 100%;
            text-align: center;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            font-size: 16px;
            color: #ffffffbd;
            margin: 0px 20px;
            background: #8B4D9F;
        }
        .ans-add-new-btn{
            width: 100%;
            background: #ffffff;
            color: #ff8a00;
            border: 2px solid #8B4D9F;
            color: #777;
        }
        .space-ptb{
            background: #f7f7f7;
        }
    </style>

    <!--=================================
job-grid -->
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--=================================
                    right-sidebar -->
                    <div class="row mb-4">
                        <div class="col-12 hmz-site-heading">
                            <h6 class="mb-0 mt-5">Employment History</h6>
                        </div>
                    </div>
                    <div class="job-filter mb-4 d-sm-flex align-items-center">
                        <div class="job-shortby ms-sm-auto d-flex align-items-center">
                            <div class="filter-btn ms-sm-3" style="width:100%"> <a href="{{url('staff/employment-history/create')}}" class="btn btn-outline-primary ans-add-new-btn" style="width:100%">Add Employment</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($employmentHistory as $employment)
                        <div class="col-md-6 col-lg-4">
                            <div class="job-list job-grid pt-3">
                                <div class="job-list-details pb-0 mb-0">
                                    <div class="job-list-info">
                                        <div class="job-list-title">
                                            <h5 class="mb-0"><a href="">{{$employment->emp_title}}</a></h5>
                                        </div>
                                        <div class="ans-flex-between">
                                            <div>
                                                <p class="ans-course-id">ID: 003</p>
                                            </div>
                                            <div>
                                                <p class="ans-course-duration">{{$employment->emp_join}} - {{$employment->emp_ending}}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="ans-institution-name">Company Name: {{$employment->emp_com_name}}</p>
                                            <p class="ans-institution-name">Reason of Leaving: {{$employment->emp_reason}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ans-flex-justify-center">
                                    <a class="ans-education-dept-icons" href="{{url('staff/employment-history/'.$employment->id.'/view')}}"><i class="far fa-eye"></i></a>
                                    <a class="ans-education-dept-icons" href="{{url('staff/employment-history/'.$employment->id.'/edit')}}"><i class="far fa-edit"></i></a>
                                    <form action="{{url('staff/employment-history/'.$employment->id)}}" method="post"
                                          class='delete_form'>
                                        @csrf
                                        @method("DELETE")
                                        <a class="job-list-favourite order-2" id="a-submit">
                                            <button type="submit"><i class="far fa-trash-alt"></i></button>
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--=================================
    job-grid -->

@endsection
@section('js')
    <script>
        $(document).on('submit', '.delete_form', function (e) {
            e.preventDefault();
            var route = $(this).attr('action');
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this data!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        url: route,
                        data: new FormData(this),
                        contentType: false,
                        data_type: 'json',
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            loader();
                        },
                        success: function (response) {
                            window.location.reload();
                            swal.close();
                            console.log(response)
                            alertMsg(response.message, response['status']);
                        },
                        error: function (xhr, error, status) {
                            // console.log(xhr.responseJSON.errors.name[0])
                            swal.close();
                            var response = xhr.responseJSON;
                            // alertMsg(response.message, 'error');
                            alertMsg(response.message, 'error');
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Cancelled',
                        'Your Data is safe :)',
                        'error'
                    )
                }
            })
        });
    </script>
@endsection
