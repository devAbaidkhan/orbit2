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
                                        <input maxlength="31" type="text" class="inputText entertxtOnly" name="emp_title" value="{{ old('emp_title', $employmentHistory->emp_title) }}">
                                        <span class="floating-label">Job Title</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input maxlength="31" type="text" class="inputText entertxtOnly" name="emp_com_name" value="{{ old('emp_com_name', $employmentHistory->emp_com_name) }}">
                                        <span class="floating-label">Company Name</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input  type="date" class="inputText" name="emp_join" value="{{ old('emp_join', $employmentHistory->emp_join) }}">
                                        <span class="floating-label">Select Joining Date</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="date" class="inputText" name="emp_ending" value="{{ old('emp_ending', $employmentHistory->emp_ending) }}">
                                        <span class="floating-label">Select Ending Date</span>
                                        </br>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input maxlength="31" type="text" class="inputText entertxtOnly" name="emp_reason" value="{{ old('emp_reason', $employmentHistory->emp_reason) }}">
                                        <span class="floating-label">Reason of leaving</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input maxlength="31" type="text" class="inputText EnterOnlyNumber" name="emp_postal" value="{{ old('emp_postal', $employmentHistory->emp_postal) }}">
                                        <span class="floating-label">Zip Code/Postal Code</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input maxlength="101" type="text" class="inputText" name="emp_comp_address" value="{{ old('emp_comp_address', $employmentHistory->emp_comp_address) }}">
                                        <span class="floating-label">Company Address</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input maxlength="31" type="text" class="inputText entertxtOnly" name="emp_contact_name" value="{{ old('emp_contact_name', $employmentHistory->emp_contact_name) }}">
                                        <span class="floating-label">Contact Person Name</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input maxlength="31" type="text" class="inputText EnterOnlyNumber" name="phone_number" value="{{ old('phone_number', $employmentHistory->phone_number) }}">
                                        <span class="floating-label">Contact Person Number</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="email" class="inputText" name="email" value="{{ old('email', $employmentHistory->email) }}">
                                        <span class="floating-label">Contact Person Email</span>
                                    </div>
                                </div>
                                <input type="hidden" name="contactable_id" id="contactable_id" value="{{ old('id', $employmentHistory->id) }}">
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
                    emp_title:{
                        required:true,
                        maxlength: 30,
                    },
                    emp_com_name:{
                        required:true,
                        maxlength: 30,
                    },
                    emp_reason:{
                        required:true,
                        maxlength: 30,
                    },
                    emp_postal:{
                        required:true,
                        maxlength: 30,
                    },
                    emp_comp_address:{
                        required:true,
                        maxlength: 100,
                    },
                    emp_contact_name:{
                        required:true,
                        maxlength: 30,
                    },
                    email:{
                        required:true,
                    },
                    phone_number:{
                        required:true,
                        maxlength: 30,
                    }
                },
                messages: {
                    emp_title:{
                        required:'Title is required',
                        maxlength: "Title must be less than 30 characters"
                    },
                    emp_com_name:{
                        required:'Name is required',
                        maxlength: "Name must be less than 30 characters"
                    },
                    emp_reason:{
                        required:'Reason is required',
                        maxlength: "Reason must be less than 30 characters"
                    },
                    emp_postal:{
                        required:'Postal Code is required',
                        maxlength: "Postal Code must be less than 30 characters"
                    },
                    emp_comp_address:{
                        required:'Address is required',
                        maxlength: "Address must be less than 100 characters"
                    },
                    emp_contact_name:{
                        required:'Contact Name is required',
                        maxlength: "Contact Name must be less than 30 characters"
                    },
                    email:{
                        required:'Email is required'
                    },
                    phone_number:{
                        required:'Phone Number is required',
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
                var route = "{{route('employment-history.update',['employment_history'=>':employment_history'])}}";
                route = route.replace(':employment_history', id);
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
