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
                            <h6 class="mb-0 mt-5">Educataional History</h6>
                        </div>
                    </div>
                    <form class="mt-4" id="form" >
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <br/>
                                    <input maxlength="31" type="text" class="inputText entertxtOnly" name="institutionName" required/>
                                    <span class="floating-label">Institution Name</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <br/>
                                    <input maxlength="31" type="text" class="inputText entertxtOnly" name="degreeObtained" required/>
                                    <span class="floating-label">Degree Obtained</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <br/>
                                    <input maxlength="31" type="text" class="inputText entertxtOnly" name="speciality" required/>
                                    <span class="floating-label">Speciality</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <br/>
                                    <input type="date" class="inputText place" name="startDate" required/>
                                    <span class="floating-label">Degree Start Date</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <br/>
                                    <input type="date" class="inputText place" name="endDate" required/>
                                    <span class="floating-label">Degree End Date</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <select class="form-select ans-form-dropdown" name="institutionCountry" aria-label="Default select example">
                                    <option selected>Institution Country</option>
                                    <option value="1">Pakistan</option>
                                    <option value="2">Turkey</option>
                                    <option value="3">Afghanitan</option>
                                </select>
                            </div>
                            <div class="mb-3 col-12">
                                <select class="form-select ans-form-dropdown" name="institutionCity" aria-label="Default select example">
                                    <option selected>Institution City</option>
                                    <option value="1">Lahore</option>
                                    <option value="2">Karachi</option>
                                    <option value="3">Islamabad</option>
                                </select>
                            </div>
                            <input type="hidden" name="contactable_id" id="contactable_id" value="{{auth()->id()}}">
                        </div>
                        <div class="row">
                            <div class="col-md-12 ob-btn-login">
                                <button class="btn btn-primary">Save</button>
                            </div>
                            @csrf
                        </div>
                    </form>
                    <div class="ob-sign-margin-top mt-md-0 forgot-pass ob-sign-link-href">
                        <p class="mt-1"><i class="fa fa-arrow-left"></i><a onclick="location.replace(document.referrer);"> Back</a></p>
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
        $(document).ready(function (){
            $('#form').validate({
                rules: {
                    instituteName: {
                        required: true,
                        maxlength: 30,
                    },
                    degreeObtained: {
                        required: true,
                        maxlength: 30,
                    },
                    speciality: {
                        required: true,
                        maxlength: 30,
                    },
                    startDate: {
                        required: true,
                    },
                    endDate: {
                        required: true,
                    },
                    country: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },

                },
                messages: {
                    instituteName:{
                        required:'Institute Name  is required',
                        maxlength: "Institute Name must be less than 30 characters"
                    },
                    degreeObtained:{
                        required:'Degree Obtained is required',
                        maxlength: "Degree Obtained must be less than 30 characters"
                    },
                    speciality:{
                        required:'Speciality is required',
                        maxlength: "Speciality must be less than 30 characters"
                    },
                    startDate:'Start Date is required',
                    endDate:'End Date is required',
                    country:'Country is required',
                    city:'City is required',
                },
            });

            $('#form').on('submit', function (e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#form').valid() ) {
                    return false;
                }
                let route = "{{route('education.store')}}";
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
