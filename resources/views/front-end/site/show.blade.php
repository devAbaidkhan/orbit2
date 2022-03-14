@extends('front-end.layouts.app')
@section('content')

    <!--=================================
job-grid -->
    <section class="space-ptb">
        <div class="container site-main-body">
            <div class="row">
                <div class="col-md-12">
                    <!--=================================
                    right-sidebar -->
                    <div class="row mb-4">
                        <div class="col-12 hmz-site-heading">
                            <h4 class="mb-0">Sites</h4>
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
                            <div class="filter-btn ms-sm-3" style="width:100%"> <a href="{{url('company/sites/create')}}" class="btn btn-outline-primary" style="width:100%">Add New Site</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($siteDeails as $siteDeail)
                        <div class="col-md-6 col-lg-4">
                          <div class="job-list job-grid pt-3">
                            <div class="job-list-details pb-0 mb-0">
                              <div class="job-list-info">
                                <div class="job-list-title">
                                  <h5 class="mb-0"><a href="#">{{$siteDeail->name}}</a></h5>
                                </div>
                                <div class="ans-flex-between">
                                  <div>
                                      <p class="ans-course-id">ID: {{$siteDeail->company_id}}</p>
                                  </div>
                                </div>
                                <div>
                                    <p class="ans-institution-name">City: {{$siteDeail->city}}</p>
                                    <p class="ans-institution-name">Address: {{$siteDeail->address}}</p>
                                    <p class="ans-institution-name">Postal Code: {{$siteDeail->postal_code}}</p>
                                </div>
                              </div>
                            </div>
                            <div class="ans-flex-justify-center">
                                <a class="ans-education-dept-icons" href="{{url('company/sites/'.$siteDeail->id.'/edit')}}"><i class="far fa-edit"></i></a>
                                <a class="ans-education-dept-icons" href="{{url('company/sites/'.$siteDeail->id.'/view')}}"><i class="far fa-eye"></i></a>
                                <form action="{{url('company/sites/'.$siteDeail->id)}}" method="post" class='delete_form'>
                                    @csrf
                                    @method("DELETE")
                                    <a class="" id="a-submit"><button type="submit" class="btn-site-delete"><i class="far fa-trash-alt"></i></button></a>
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
