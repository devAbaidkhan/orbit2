@extends('layouts.app')

<!--=================================
header -->
@section('content')
    <style>
        * {
            margin: 0;
            padding: 0
        }

        html {
            height: 100%
        }

        #grad1 {
            /*background-color:  #9C27B0;*/
            /*background-image: linear-gradient(120deg, #FF4081, #81D4FA)*/
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;
            position: relative
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E
        }

        #msform input,
        #msform textarea {
            padding: 0px 8px 4px 8px;
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 16px;
            letter-spacing: 1px
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: none;
            font-weight: bold;
            border-bottom: 2px solid skyblue;
            outline-width: 0
        }

        #msform .action-button {
            width: 100px;
            background: skyblue;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
        }

        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px
        }

        select.list-dt:focus {
            border-bottom: 2px solid skyblue
        }

        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #000000
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 25%;
            float: left;
            position: relative
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f023"
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f09d"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: skyblue
        }

        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            width: 204;
            height: 104;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }
    </style>

    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 ">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    {{--                    <h2><strong>Sign Up Your User Account</strong></h2>--}}
                    {{--                    <p>Fill all form field to go to next step</p>--}}
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform">
                            @csrf
                            <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Account</strong></li>
                                    <li id="personal"><strong>Personal</strong></li>
                                    {{--   <li id="payment"><strong>Payment</strong></li>--}}
                                    <li id="confirm"><strong>Finish</strong></li>
                                </ul> <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Account Information</h2>
                                        <div class="row">
                                            <div class="mb-3 col-12">
                                                <div class="user-input-wrp">
                                                    <input type="text" class="inputText" name="name">
                                                    <span class="floating-label">Name</span>

                                                </div>
                                            </div>
                                            <div class="mb-3 col-12">
                                                <div class="user-input-wrp">
                                                    <input type="number" class="inputText" name="phoneNumber">

                                                    <span class="floating-label">Phone Number</span>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-12">
                                                <div class="user-input-wrp">
                                                    <input id="email" type="text" class="inputText" name="email" onblur="duplicateEmail(this)">
                                                    <span id="emailValidationError" class="error"></span>
                                                    <span class="floating-label">Email ID</span>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-12">
                                                <div class="user-input-wrp">
                                                    <input type="password" class="inputText" id="password"
                                                           name="password">

                                                    <span class="floating-label">Password</span>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-12">
                                                <div class="user-input-wrp">
                                                    <input type="password" class="inputText"
                                                           name="confirmPassword">

                                                    <span class="floating-label">Confirm Password</span>
                                                </div>
                                            </div>

                                        </div>
                                        {{--                                        <input type="email" name="email" placeholder="Email Id" />--}}
                                        {{--                                        <input type="text" name="uname" placeholder="UserName" />--}}
                                        {{--                                        <input type="password" name="pwd" placeholder="Password" />--}}
                                        {{--                                        <input type="password" name="cpwd" placeholder="Confirm Password" />--}}
                                    </div>


                                    <input type="button" name="next" class="next action-button" value="Next Step"/>
                                </fieldset>
                                <fieldset id="regiterAs">
                                    <div class="form-card">
                                        <h2 class="fs-title">Register as <span id="register_as"></span></h2>
                                        <input type="hidden" id="role" name="role">
                                        <div class="row align-items-center">
                                            {{--                                            <h2 class="title text-center register-heading">Register as</h2>--}}

                                            <div class="col-lg-3 col-md-4 col-6 text-center mb-3 role_div">
                                                <div class="ans-category-item pt-3">
                                                    <a href="#" class="category-item p-0">
                                                        <div class="category-icon mb-3">
                                                            <i class="flaticon-account"></i>
                                                        </div>
                                                        <h6 class="ans-category-box-heading role">Company</h6>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6 text-center mb-3 role_div">
                                                <div class="ans-category-item pt-3">
                                                    <a href="#" class="category-item p-0">
                                                        <div class="category-icon mb-3 text-center">
                                                            <i class="flaticon-conversation"></i>
                                                        </div>
                                                        <h6 class="ans-category-box-heading role">Agency</h6>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6 text-center mb-3 role_div">
                                                <div class="ans-category-item pt-3">
                                                    <a href="#" class="category-item p-0">
                                                        <div class="category-icon mb-3">
                                                            <i class="flaticon-money"></i>
                                                        </div>
                                                        <h6 class="ans-category-box-heading role">Subcontractor</h6>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6 text-center mb-3 role_div">
                                                <div class="ans-category-item pt-3">
                                                    <a href="#" class="category-item p-0">
                                                        <div class="category-icon mb-3">
                                                            <i class="flaticon-mortarboard"></i>
                                                        </div>
                                                        <h6 class="ans-category-box-heading role"> Staff</h6>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <input type="button" name="previous" class="previous action-button-previous"
                                           value="Previous"/> <input type="button" name="next" id="next"
                                                                     class="next action-button" value="Next Step"
                                                                     disabled style="background-color:lightgrey"/>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Success !</h2> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-3"><img
                                                    src="https://img.icons8.com/color/96/000000/ok--v2.png"
                                                    class="fit-image"></div>
                                        </div>
                                        <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5>You Have Successfully Signed Up</h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <p class="mt-1">Already have an account? <a href="{{route('login')}}">Login here</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=================================
  header -->

    <!--=================================
    inner banner -->

    <!--=================================
    inner banner -->

    <!--=================================
    Signin -->


    <!--=================================
    Signin -->

    <!--=================================
    feature-info-->


    <!--=================================
    Back To Top-->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-angle-up"></i>
    </div>
    <!--=================================
    Back To Top-->

    <!--=================================
    Javascript -->

@endsection
@section('js')
    <script>


        $(document).ready(function () {




            $('.ans-category-item').click(function () {
                $('.ans-category-item.checked').removeClass('checked')

                $(this).addClass('checked')
                let role = $(this).find('h6').text()
                console.log(role)
                $('#role').val(role)
                $('#register_as').text(role)
            })
            $('.ans-category-item').click(function () {

                $('#next').prop('disabled', false)
                $('.next').css({'background-color': 'skyblue'});
            })


            $('#msform').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    phoneNumber: {
                        required: true,
                        number: true
                    },
                    email: {
                        required: true,
                        email: true,

                    },
                    password: {
                        required: true,
                    },
                    confirmPassword: {
                        required: true,
                        // min:8,
                        //equalTo:'#password'
                    },

                },
                messages: {
                    name: 'Name is required',
                    phoneNumber: 'Phone Number is required',
                    email: {
                        required: 'Email is required11',
                    },
                    password: 'Password is required',
                },
            });

            $('#msform').on('submit', function (e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#msform').valid() || !$('#role').val().trim()) {
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: '{{route('register.save')}}',
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
                        // if(response.email){
                        {{--window.location.replace("{{url('login')}}");--}}
                        // }


                    },
                    error: function (xhr, error, status) {
                        // console.log(xhr.responseJSON.errors.name[0])
                        //window.location = '/register';
                        swal.close();
                        var response = xhr.responseJSON;

                        // alertMsg(response.message, 'error');
                        alertMsg(response.message, 'error');
                    }
                });
            });
        })

        $(document).ready(function () {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function () {

                if (!$('#msform').valid()) {
                    return false;
                }
                if ($('.next').attr('id') !== 'register') {
                    $(".next").val('Register')

                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();

//Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
                    next_fs.show();
//hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                        step: function (now) {
// for making fielset appear animation
                            opacity = 1 - now;

                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({'opacity': opacity});
                        },
                        duration: 600
                    });
                }
                setTimeout(function () {
                    $(this).attr('id', 'register')
                    $(".next").attr('type', 'submit')
                }, 100)
            });

            $(".previous").click(function () {
                $(".next").attr('id', '')
                $(".next").val('Next Step')
                $(".next").attr('type', 'button')
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

//Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
                previous_fs.show();

//hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now) {
// for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function () {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function () {
                return false;
            })

        });

    </script>
@endsection
