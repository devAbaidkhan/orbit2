@extends('front-end.layouts.app')
@section('content')
    <section class="space-ptb bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 tabBtns">
                    <div class="section-title text-center">
                        <h2 class="text-primary">Post a New Job</h2>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class=" justify-content-center tabBtns">
                        <ul class="nav nav-tabs nav-tabs-03 justify-content-center d-sm-flex text-center" id="myTab"
                            role="tablist">
                            <li class="flex-fill">
                                <a class="nav-item active" id="Job-detail-tab" data-toggle="tab" href="#Job-detail"
                                   role="tab" aria-controls="Job-detail" aria-selected="false">
                                    <div class="feature-info-icon mb-3">
                                        <i class="flaticon-suitcase"></i>
                                    </div>
                                    <span>Job Detail</span>
                                </a>
                            </li>
                            <li class="flex-fill">
                                <a class="nav-item" id="packageTabBtn" data-toggle="tab" href="#Package" role="tab"
                                   aria-controls="Package" aria-selected="false">
                                    <div class="feature-info-icon mb-3">
                                        <i class="flaticon-businessman"></i>
                                    </div>
                                    <span>Package &amp; Payments</span>
                                </a>
                            </li>
                            <li class="flex-fill">
                                <a class="nav-item" data-toggle="tab" href="#Confirm" role="tab"
                                   aria-controls="Confirm" id="confirmTabBtn" aria-selected="false">
                                    <div class="feature-info-icon mb-3">
                                        <i class="flaticon-tick"></i>
                                    </div>
                                    <span>Confirmation</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form id="form">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="Job-detail" role="tabpanel" aria-labelledby="Job-detail-tab">
                <section class="space-ptb">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                {{csrf_field()}}
                                <div class="user-input-wrp">
                                    <label class="mb-2">Job Title *</label>
                                    <input maxlength="31" type="text" class="form-control entertxtOnly" id="title" name="title"
                                           placeholder="Enter a Title">
                                </div>
                                <div class="user-input-wrp">
                                    <label class="mb-2">Sites</label>
                                    <select class="form-control" id="" name="site">
                                        <option value="">-Select One-</option>
                                        @foreach($sites as $site)
                                            <option value="{{$site->id}}">{{$site->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="user-input-wrp">
                                    <label class="mb-2">Description *</label>
                                    <textarea maxlength="251" class="form-control" name="description" rows="4"></textarea>
                                </div>
                                <div class="user-input-wrp">
                                    <label class="mb-2">Time In *</label>
                                    <input type="time" class="form-control" name="inTime" id=""
                                           placeholder="In Time"/>
                                </div>
                                <div class="user-input-wrp">
                                    <label class="mb-2">Time Out *</label>
                                    <input type="time" class="form-control" id="" name="outTime"
                                           placeholder="Out Time"/>
                                </div>
                                <div class="user-input-wrp">
                                    <label class="mb-2">Break Time Starts *</label>
                                    <input type="time" class="form-control" id="" name="breakTimeStart"
                                           placeholder="Break Time Start"/>
                                </div>
                                <div class="user-input-wrp">
                                    <label class="mb-2">Break Time Ends *</label>
                                    <input type="time" class="form-control" id="" name="breakTimeEnd"
                                           placeholder="End Break Time"/>
                                </div>
                                <div class="user-input-wrp">
                                    <label class="mb-2">Job Start Date *</label>
                                    <input type="date" class="form-control" id="" name="jobStartDate"
                                           placeholder="Job Satrt Date"/>
                                </div>
                                <div class="user-input-wrp">
                                    <label class="mb-2">Job End Date *</label>
                                    <input type="date" class="form-control" id="" name="jobEndDate"
                                           placeholder="Job End Date"/>
                                </div>

                                <div class="user-input-wrp">
                                    <input class="inputText" type="checkbox" name="workingDays[]" value="monday" id="">
                                    <span class="floating-label">Monday</span>
                                </div>
                                <div class="user-input-wrp">
                                    <input class="inputText" type="checkbox" name="workingDays[]" value="tuesday" id="">

                                    <span class="floating-label">Tuesday</span>
                                </div>
                                <div class="user-input-wrp">
                                    <input class="inputText" type="checkbox" name="workingDays[]" value="wednesday" id="">

                                    <span class="floating-label">Wednesday</span>
                                </div>
                                <div class="user-input-wrp">
                                    <input class="inputText" type="checkbox" name="workingDays[]" value="thuresday" id="">

                                    <span class="floating-label">Thuresday</span>
                                </div>
                                <div class="user-input-wrp">
                                    <input class="inputText" type="checkbox" name="workingDays[]" value="friday" id="">

                                    <span class="floating-label">Firday</span>
                                </div>
                                <div class="user-input-wrp">
                                    <input class="inputText" type="checkbox" name="workingDays[]" value="saturday" id="">

                                    <span class="floating-label">Saturday</span>
                                </div>
                                <div class="user-input-wrp">
                                    <input class="inputText" type="checkbox" name="workingDays[]" value="sunday" id="">
                                    <span class="floating-label">Sunday</span>
                                </div>
                            </div>

                        </div>


{{--                        <div class="form-group col-12 mt-3 mb-3">--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="checkbox" value="" id="accepts-01">--}}
{{--                                <label class="form-check-label ps-1" for="accepts-01">You accept our Terms and--}}
{{--                                    Conditions--}}
{{--                                    and Privacy Policy</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="button" id="next">Next</button>
                        </div>
                    </div>

                </section>
            </div>
            <div class="tab-pane fade show" id="Package" data-toggle="tab">
                @include('front-end.job.includes.create-step-3')
            </div>
            <div class="tab-pane fade show" id="Confirm" data-toggle="tab">
                @include('front-end.job.includes.create-step-2')
            </div>
        </div>
    </form>







    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-angle-up"></i>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#next').on('click', function () {
                let check = $('#form').valid()
                console.log(check)
                if (check) {
                    $('#packageTabBtn').trigger('click')
                }

            })

            // $('#post').on('click', function () {
            //     let check = $('#form').valid()
            //     console.log(check)
            //     if (check) {
            //         alert()
            //     }
            //
            // })
            $(".checkBox").rules("add", {
                required: true,
                minlength: 3
            });


            $('#previous').on('click', function () {
                $('#Job-detail-tab').trigger('click')
            })

                $(document).on('click','#postJob', function (e) {
                    e.preventDefault();
                    // check if the input is valid using a 'valid' property
                    if (!$('#form').valid() ) {
                        return false;
                    }
                    let route = "{{route('jobs.store')}}";
                    let form = $('#form')
                    $.ajax({
                        type: 'POST',
                        url: route,
                        data: new FormData(form[0]),
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
                            if(response['status'] === 'success'){
                                $('#confirmTabBtn').trigger('click');
                                $('.tabBtns').hide()
                            }
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

            $('#form').validate({
                rules: {
                    title: {
                        required: true,
                        maxlength: 30,
                    },
                    site: {
                        required: true
                    },
                    description: {
                        required: true,
                        maxlength: 100,
                    },
                    inTime: {
                        required: true
                    },
                    outTime: {
                        required: true
                    },
                    breakTimeStart: {
                        required: true
                    },
                    breakTimeEnd: {
                        required: true
                    },
                    jobStartDate: {
                        required: true
                    },
                    jobEndDate: {
                        required: true
                    },
                    gender: {
                        required: true
                    },
                    salary: {
                        required: true,
                        maxlength: 30,
                    },
                    quantity: {
                        required: true,
                        maxlength: 30,
                    },
                    experience: {
                        required: true,
                        maxlength: 30,
                    },
                    position: {
                        required: true
                    },
                    type: {
                        required: true
                    }

                },
                messages: {
                    title: {
                        required:'Title is Required',
                        maxlength: "Title must be less than 30 characters"
                    },
                    site: 'Site is Required',
                    description:{
                        required:'Description is Required',
                        maxlength: "Description must be less than 250 characters"
                    },
                    inTime: 'In Time is Required',
                    outTime: 'Out Time is Required',
                    breakTimeStart: 'Break Time Start is Required',
                    breakTimeEnd: 'Break Time End is Required',
                    jobStartDate: 'Job Start Date is Required',
                    jobEndDate: 'Job End Date is Required',
                    salary: {
                        required:'Salary is Required',
                        maxlength: "Salary must be less than 30 characters"
                    },
                    quantity: {
                        required:'Quantity is Required',
                        maxlength: "Quantity must be less than 30 characters"
                    },
                    type: 'Type is Required',
                    experience: {
                        required:'Experience is Required',
                        maxlength: "Experience must be less than 30 characters"
                    },
                    position: 'Position is Required',
                }
            })
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
