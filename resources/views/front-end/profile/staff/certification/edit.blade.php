@extends('front-end.layouts.app')
@section('content')

    <!--=================================
job-grid -->
    <section class="staff-education-main">
        <section class="space-ptb bg-light" style="padding:10px 0px">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2>Add New Certificate</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="space-ptb">
            <div class="container">
                <div class="tab-content staff-confidential-form">
                    <div class="tab-pane active" id="candidate" role="tabpanel">
                        <form class="mt-4" id="form">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="text" class="inputText" name="cert_name" value="{{ old('cert_name', $staffEducations->cert_name) }}">
                                        <span class="floating-label">Certificate Name</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="text" class="inputText" name="cert_no" value="{{ old('cert_no', $staffCertification->cert_no) }}">
                                        <span class="floating-label">Certificate Number</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="date" class="inputText" name="cert_issue" value="{{ old('cert_issue', $staffCertification->cert_issue) }}">
                                        <span class="floating-label">Issue Date</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="date" class="inputText" name="cert_expiry" value="{{ old('cert_expiry', $staffCertification->cert_expiry) }}">
                                        <span class="floating-label">Expiry Date</span>
                                    </div>
                                </div>
                                <input type="hidden" name="contactable_id" id="contactable_id" value="{{ old('id', $staffCertification->id) }}">
                            </div>
                            <div class="row">
                                <div class="col-md-12 ob-btn-login">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                                @csrf
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </section>
    <!--=================================
    job-grid -->

@endsection
@section('js')
    <script>
        $(document).ready(function (){
            $('#form').validate({
                rules: {
                    cert_name:{
                        required:true,
                        maxlength: 30,
                    },
                    cert_no:{
                        required:true,
                        maxlength: 100,
                    }
                },
                messages: {
                    cert_name:{
                        required:'Certification Name is required',
                        maxlength: "Name must be less than 30 characters"
                    },
                    cert_no:{
                        required:'Certification Number is required',
                        maxlength: "Phone Number must be less than 30 characters"
                    },
                },
            });

            $('#form').on('submit', function (e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#form').valid()) {
                    return false;
                }
                var id = $('#contactable_id').val();
                var route = "{{route('certification.update',['certification'=>':certification'])}}";
                route = route.replace(':certification', id);
                console.log(route);
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
            });
        })
    </script>
@endsection
