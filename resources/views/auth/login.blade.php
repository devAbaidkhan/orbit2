@extends('layouts.app')

@section('content')
    <!--=================================
Signin -->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-12">
                    <div class="login-register">
                        <div class="section-title">
                            <img src="images/logo/WorkOrBit-Logo-500.png" width="220px" class="img-responsive section-title-image">
                            <h4 class="text-center login-text ob-login-main-heading">Welcome Back</h4>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                                <form class="mt-4" id="loginForm" >
                                    <div class="row">
                                        <div class="mb-3 col-12">
                                            <!-- <label class="form-label" for="Email2">Username / Email Address</label>
                                            <input type="text" class="form-control" id="Email22"> -->
                                            <div class="user-input-wrp">
                                                <input type="text" class="inputText" name="email">

                                                <span class="floating-label">Phone Number or Email ID</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-12">
                                            <div class="user-input-wrp">
                                                <input type="password" class="inputText" name="password">
                                                <span class="floating-label">Password</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mt-md-0 forgot-pass login-link-href">
                                                <a href="forgot-password.php" class="">Forgot Password  ?</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 ob-btn-login">
                                            <button class="btn btn-primary ob-btn" type="submit" >Log In</button>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="ob-sign-margin-top mt-md-0 forgot-pass ob-sign-link-href">
                                                <p class="mt-1">Don't have Account? <a href="{{route('register')}}">Sign Up here</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    @csrf
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Signin -->


@endsection


@section('js')
    <script>
        $(document).ready(function (){
            $('.ans-category-item').click(function (){

                let role = $(this).find('h6').text()

                console.log(role)

                $('#role').val(role)
                $('#register_as').text(role)
            })


            $('#loginForm').validate({
                rules: {
                    email:{
                        required:true,
                    },
                    password:{
                        required:true,
                    },

                },
                messages: {
                    name:'Name is required',
                    password:'Password is required',
                },
            });

            $('#loginForm').on('submit', function (e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#loginForm').valid()) {
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: '{{route('login')}}',
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
                        console.log(response['status'])
                        alertMsg(response.message, response['status']);
                        // if(response.email){
                        if(response['status'] === 'success') {
                            window.location.replace("{{url('/')}}");
                        }else {
                            alertMsg('Fialed to Login', 'error');
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
        })

        $(document).ready(function(){

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function(){

                if (!$('#msform').valid()) {
                    return false;
                }
                if($('.next').attr('id') !== 'register'  ) {
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
               setTimeout(function (){
                   $(this).attr('id','register')
                   $(".next").attr('type','submit')
               },100)
            });

            $(".previous").click(function(){
                $(".next").attr('id','')
                $(".next").val('Next Step')
                $(".next").attr('type','button')
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

//Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
                previous_fs.show();

//hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function(now) {
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

            $('.radio-group .radio').click(function(){
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function(){
                return false;
            })

        });

    </script>
@endsection
