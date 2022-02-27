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
        .text-left{
            text-align: left;
        }
        .ans-form-dropdown{
            margin-top: 25px;
            border: none;
            border-bottom: solid medium #999;
            color: #999;
            background-color: #fafafa;
        }
        .ans-form-submit-btn{
            background-image: linear-gradient(to right, #B074C4, #8B4D9F);
            padding: 8px 40px;
            border: 0px;
            color: #fff;
            font-size: 20px;
            margin-top: 40px;
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
                            <h6 class="mb-0 mt-5">Add New Training</h6>
                        </div>
                    </div>
                    <form class="mt-4" id="form">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <br/>
                                    <input type="text" class="inputText" name="courseName" required/>
                                    <span class="floating-label">Course Name</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <br/>
                                    <input type="text" class="inputText" name="certificateObtained" required/>
                                    <span class="floating-label">Certificate Obtained</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <br/>
                                    <input type="text" class="inputText" name="providerName" required/>
                                    <span class="floating-label">Provider Name</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <br/>
                                    <input type="date" class="inputText place" name="trainingStartDate" required/>
                                    <span class="floating-label">Training Start Date</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <br/>
                                    <input type="date" class="inputText place" name="trainingEndDate" required/>
                                    <span class="floating-label">Training End Date</span>
                                </div>
                            </div>
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
    <!--=================================
    job-grid -->

@endsection
@section('js')
    <script>
        $(document).ready(function (){
            $('#form').validate({
                rules: {
                    name:{
                        required:true,
                        maxlength: 30,
                    },
                    address:{
                        required:true,
                        maxlength: 100,
                    },
                    title:{
                        required:true,
                        maxlength: 30,
                    },
                    jobTitle:{
                        required:true,
                        maxlength: 30,
                    },
                    phoneNumber:{
                        required:true,
                        maxlength: 30,
                    },
                    postalCode:{
                        required:true,
                        maxlength: 30,
                    },
                    email:{
                        required:true,
                    },
                },
                messages: {
                    name:{
                        required:'Name is required',
                        maxlength: "Name must be less than 30 characters"
                    },
                    phoneNumber:{
                        required:'Phone Number is required',
                        maxlength: "Phone Number must be less than 30 characters"
                    },
                    address:{
                        required:'Address is required',
                        maxlength: "Address must be less than 100 characters"
                    },
                    postalCode:{
                        required:'Postal Code is required',
                        maxlength: "Postal Code must be less than 30 characters"
                    },
                    email:'Email is required',
                    title:{
                        required:'Title  is required',
                        maxlength: "Title must be less than 30 characters"
                    },
                    jobTitle:{
                        required:'Job Title  is required',
                        maxlength: "Job Title must be less than 30 characters"
                    },
                },
            });

            $('#form').on('submit', function (e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#form').valid() ) {
                    return false;
                }
                let route = "{{route('official-training.store')}}";
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
