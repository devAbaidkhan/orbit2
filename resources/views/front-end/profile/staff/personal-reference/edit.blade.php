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
                            <h2>Add New Personal Reference</h2>
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
                                        <input type="text" class="inputText" name="ref_name" value="{{ old('ref_name', $personalReference->ref_name) }}">
                                        <span class="floating-label">Enter Person's Name</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="text" class="inputText" name="ref_num" value="{{ old('ref_num', $personalReference->ref_num) }}">
                                        <span class="floating-label">Mobile Number</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="email" class="inputText" name="ref_email" value="{{ old('ref_email', $personalReference->ref_email) }}">
                                        <span class="floating-label">Email Address</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="text" class="inputText" name="ref_rel" value="{{ old('ref_rel', $personalReference->ref_rel) }}">
                                        <span class="floating-label">Relation</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="text" class="inputText" name="ref_occup" value="{{ old('ref_occup', $personalReference->ref_occup) }}">
                                        <span class="floating-label">Occupation</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="text" class="inputText" name="ref_long" value="{{ old('ref_long', $personalReference->ref_long) }}">
                                        <span class="floating-label">How Long you Know</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="text" class="inputText" name="ref_postal" value="{{ old('ref_postal', $personalReference->ref_postal) }}">
                                        <span class="floating-label">Postal Code</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="text" class="inputText" name="ref_address" value="{{ old('ref_address', $personalReference->ref_address) }}">
                                        <span class="floating-label">Enter Address</span>
                                    </div>
                                </div>
                                <input type="hidden" name="contactable_id" id="contactable_id" value="{{ old('id', $personalReference->id) }}">
                            </div>
                            <div class="row">
                                <div class="col-md-12 ob-btn-login">
                                    <button class="btn btn-primary">Save</button>
                                </div>

                            </div>
                        </form>
                        <div class="ob-sign-margin-top mt-md-0 forgot-pass ob-sign-link-href">
                            <p class="mt-1"><i class="fa fa-arrow-left"></i><a onclick="location.replace(document.referrer);"> Back</a></p>
                        </div>
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
                    ref_name:{
                        required:true,
                        maxlength: 30,
                    },
                    ref_num:{
                        required:true,
                        maxlength: 30,
                    },
                    ref_email:{
                        required:true
                    },
                    ref_rel:{
                        required:true,
                        maxlength: 30,
                    },
                    ref_occup:{
                        required:true,
                        maxlength: 30,
                    },
                    ref_long:{
                        required:true,
                        maxlength: 30,
                    },
                    ref_postal:{
                        required:true,
                        maxlength: 30,
                    },
                    ref_address:{
                        required:true,
                        maxlength: 100,
                    },

                },
                messages: {
                    ref_name:{
                        required:' Name is required',
                        maxlength: "Name must be less than 30 characters"
                    },
                    ref_num:{
                        required:'Number is required',
                        maxlength: "Number must be less than 30 characters"
                    },
                    cert_name:{
                        required:'Name is required',
                        maxlength: "Name must be less than 30 characters"
                    },
                    ref_rel:{
                        required:'Relation is required',
                        maxlength: "Relation must be less than 30 characters"
                    },
                    ref_occup:{
                        required:'Occupation is required',
                        maxlength: "Occupation must be less than 30 characters"
                    },
                    ref_long:{
                        required:'Certification Name is required',
                        maxlength: "Name must be less than 30 characters"
                    },
                    ref_postal:{
                        required:'postal Code is required',
                        maxlength: "postal Code must be less than 30 characters"
                    },
                    ref_address:{
                        required:'Address is required',
                        maxlength: "Address must be less than 100 characters"
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
                var route = "{{route('personal-reference.update',['personal_reference'=>':personal_reference'])}}";
                route = route.replace(':personal_reference', id);
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
