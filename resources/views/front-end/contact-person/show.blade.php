@extends('front-end.layouts.app')
@section('content')

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
                            <h6 class="mb-0 ">Contect Person List</h6>
                        </div>
                    </div>
                    <div class="job-filter mb-4 d-sm-flex align-items-center">
                        <div class="job-alert-bt">
                            <div class="tab-content">
                                <div class="tab-pane active" id="candidate" role="tabpanel">
                                    <form class="mt-4" id="loginForm" >
                                        <div class="row">
                                            <div class="mb-3 col-12">
                                                <div class="user-input-wrp">
                                                    <br/>
                                                    <input type="text" class="inputText" required/>
                                                    <span class="floating-label">Search</span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                        <div class="job-shortby ms-sm-auto d-flex align-items-center">
                            <div class="filter-btn ms-sm-3" style="width:100%"> <a href="{{route('contact-person.create')}}" class="btn btn-outline-primary" style="width:100%">Add Contact Person</a>
                            </div>
                        </div>
                    </div>
                    @foreach($contactPersons as $contactPerson)
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="job-list job-grid">
                                    <div class="job-list-details">
                                        <div class="job-list-info">

                                            <div class="job-list-title">
                                                <h5 class="mb-0"><a href="#">{{$contactPerson->name}}</a></h5>
                                            </div>
                                            <div class="job-list-option">
                                                <ul class="list-unstyled">
                                                    <li> <span>Title</span> <a href="employer-detail.html">{{$contactPerson->title}}</a> </li>
                                                    <li><i class="fas fa-map-marker-alt pe-1"></i>{{$contactPerson->address}}</li>
                                                    <li><i class="fas fa-filter pe-1"></i>Accountancy</li>
                                                    <li><a class="freelance" href="#"><i class="fas fa-suitcase pe-1"></i>Freelance</a></li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="job-list-favourite-time">
                                        <a class="job-list-favourite order-2" href="{{url('contact-person/'.$contactPerson->id.'/view')}}"><i class="far fa-eye"></i></a>
                                        <a class="job-list-favourite order-2" href="{{url('contact-person/'.$contactPerson->id.'/edit')}}"><i class="far fa-edit"></i></a>
                                        <form action="{{url('contact-person/'.$contactPerson->id)}}" method="post" class='delete_form'>
                                            @csrf
                                            @method("DELETE")
                                            <a class="job-list-favourite order-2" id="a-submit"><button type="submit"><i class="far fa-trash-alt"></i></button></a>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 text-center mt-4">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item disabled"> <span class="page-link b-radius-none">Prev</span> </li>
                            <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">25</a></li>
                            <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                        </ul>
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
