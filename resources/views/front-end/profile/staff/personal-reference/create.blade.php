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
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input maxlength="31" type="text" class="inputText entertxtOnly" name="ref_name">
                                        <span class="floating-label">Enter Person's Name</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input maxlength="31" type="text" class="inputText EnterOnlyNumber" name="ref_num">
                                        <span class="floating-label">Mobile Number</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="email" class="inputText" name="ref_email">
                                        <span class="floating-label">Email Address</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input maxlength="31" type="text" class="inputText entertxtOnly" name="ref_rel">
                                        <span class="floating-label">Relation</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input maxlength="31" type="text" class="inputText entertxtOnly" name="ref_occup">
                                        <span class="floating-label">Occupation</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input maxlength="31" type="text" class="inputText entertxtOnly" name="ref_long">
                                        <span class="floating-label">How Long you Know</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input maxlength="31" type="text" class="inputText EnterOnlyNumber" name="ref_postal">
                                        <span class="floating-label">Postal Code</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input maxlength="101" type="text" class="inputText" name="ref_address">
                                        <span class="floating-label">Enter Address</span>
                                    </div>
                                </div>
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
                if (!$('#form').valid() ) {
                    return false;
                }
                let route = "{{route('personal-reference.store')}}";
                console.log(route)
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
                        // }


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

        ///////////// Enter Only text //////////////
        $(document).ready(function (){
            $(".entertxtOnly").keypress(function (e) {
                var k;
                document.all ? k = e.keyCode : k = e.which;
                return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32);
            });
        });
        ///////////// Enter Only Number //////////////
        $(document).ready(function () {
            //called when key is pressed in textbox
            $(".EnterOnlyNumber").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
                }
            });
        });
    </script>
@endsection
