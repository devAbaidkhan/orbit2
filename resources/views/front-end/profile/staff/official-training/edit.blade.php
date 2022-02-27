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
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <br/>
                                    <input type="text" class="inputText" name="courseName" value="{{ old('courseName', $staffOfficialTrainings->courseName) }}"/>
                                    <span class="floating-label">Course Name</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <br/>
                                    <input type="text" class="inputText" name="certificateObtained" value="{{ old('certificateObtained', $staffOfficialTrainings->certificateObtained) }}"/>
                                    <span class="floating-label">Certificate Obtained</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <br/>
                                    <input type="text" class="inputText" name="providerName" value="{{ old('providerName', $staffOfficialTrainings->providerName) }}"/>
                                    <span class="floating-label">Provider Name</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <br/>
                                    <input type="date" class="inputText place" name="trainingStartDate" value="{{ old('trainingStartDate', $staffOfficialTrainings->trainingStartDate) }}"/>
                                    <span class="floating-label">Training Start Date</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <br/>
                                    <input type="date" class="inputText place" name="trainingEndDate" value="{{ old('trainingEndDate', $staffOfficialTrainings->trainingEndDate) }}"/>
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
                var route = "{{route('official-training.update',['official_training'=>':official_training'])}}";
                route = route.replace(':official_training', id);
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
