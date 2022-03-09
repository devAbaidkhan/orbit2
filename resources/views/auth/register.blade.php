@extends('layouts.app')

<!--=================================
header -->
@section('content')

    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 ">
                <div class="px-0 pt-4 pb-0 mt-3 mb-3">
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform">
                                <div class="section-title">
                                    <img src="images/logo/WorkOrBit-Logo-500.png" width="220px" class="img-responsive section-title-image">
                                    <h4 class="text-center login-text ob-login-main-heading">Sign Up</h4>
                                </div>
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="mb-3 col-12">
                                                <div class="user-input-wrp">
                                                    <input maxlength="31" type="text" class="inputText entertxtOnly" name="name">
                                                    <span class="floating-label">Name</span>

                                                </div>
                                            </div>
                                            <div class="mb-3 col-12">
                                                <div class="user-input-wrp">
                                                    <input maxlength="31" type="number" class="inputText EnterOnlyNumber" name="phoneNumber">
                                                    <span class="floating-label">Phone Number</span>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-12">
                                                <div class="user-input-wrp">
                                                    <input type="text" class="inputText" name="email">

                                                    <span class="floating-label">Email ID</span>
                                                </div>
                                            </div>
                                            @csrf
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
                                            <div class="mb-3 col-12">
                                            {{-- <input id="checkbox" type="checkbox" /> --}}
                                             <label for="checkbox"> I agree to the <a href="#">Terms and Conditions</a>.</label>
                                            </div>

                                        </div>
                                    </div>


                                    <input type="button" name="next" class="next action-button" value="Proceed"/>
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
                                                            <img src="{{asset('images/register-images/1--Company.png')}}" width="60px" alt="">
                                                        </div>
                                                        <h6 class="ans-category-box-heading role">Company</h6>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6 text-center mb-3 role_div">
                                                <div class="ans-category-item pt-3">
                                                    <a href="#" class="category-item p-0">
                                                        <div class="category-icon mb-3 text-center">
                                                            <img src="{{asset('images/register-images/2--Agency.png')}}" width="60px" alt="">
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
                                                            <img src="{{asset('images/register-images/4--Sub-Contractor.png')}}" width="60px" alt="">
                                                        </div>
                                                        <h6 class="ans-category-box-heading role">Subcontractor</h6>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6 text-center mb-3 role_div">
                                                <div class="ans-category-item pt-3">
                                                    <a href="#" class="category-item p-0">
                                                        <div class="category-icon mb-3">
                                                            <img src="{{asset('images/register-images/3--Staff.png')}}" width="60px" alt="">
                                                        </div>
                                                        <h6 class="ans-category-box-heading role"> Staff</h6>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <input type="button" name="previous" class="previous action-button-previous"
                                           value="Previous"/>
                                    <input type="button" name="next"
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

                $('.next').prop('disabled', false)
                $('.next').css({'background-color': 'skyblue'});
            })


            $('#msform').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 30,
                    },
                    phoneNumber: {
                        required: true,
                        number: true
                    },
                    email: {
                        required: true,
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
                    name:{
                        required:'Name is required',
                        maxlength: "Name must be less than 30 characters"
                    },
                    phoneNumber: 'Phone Number is required',
                    email: 'Email is required',
                    password: 'Password is required',
                },
            });

            $(document).on('click','#register', function (e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#msform').valid() || !$('#role').val().trim()) {
                    return false;
                }
               let form = $('#msform')
                $.ajax({
                    type: 'POST',
                    url: '{{route('register.save')}}',
                    data: new FormData(form[0]),
                    // data: $('#msform').serialize(),
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
                            $('.next').attr('id','')
                            $('.next').attr('type','button')
                            $('.next').trigger('click')
                        }
                        // if(response.email){
                        {{--window.location.replace("{{url('login')}}");--}}
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
                    $(".next").attr('id', 'register')
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


        });

    </script>
@endsection
