@extends('front-end.layouts.app')

<!--=================================
header -->
@section('content')


  <!--=================================
  header -->

<!--=================================
inner banner -->

<!--=================================
inner banner -->

<!--=================================
Signin -->

<section class="space-ptb">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-10 col-md-12">
        <div class="login-register">
          <div class="section-title ob-login-main-heading">
            <img src="images/logo/WorkOrBit-Logo-500.png" width="220px" class="img-responsive section-title-image">
           <h4 class="text-center ob-login-main-heading">Registration</h4>
          </div>

            <form action="{{route('register.save')}}" id="form" method="post">
                @csrf




                <div class="tab-content">
                    <div class="tab-pane active" id="candidate" role="tabpanel">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="my-custom-text-field">
                                        <input type="text" class="my-custom-input" name="name">
                                        <label class="my-custom-label">Name</label>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="my-custom-text-field">
                                        <input type="number" class="my-custom-input" name="phoneNumber">
                                        <label class="my-custom-label" >Phone Number</label>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="my-custom-text-field">
                                        <input type="text" class="my-custom-input" name="email">
                                        <label class="my-custom-label">Email ID</label>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="my-custom-text-field">
                                        <input type="password" class="my-custom-input" id="password" name="password">
                                        <label class="my-custom-label" >Password</label>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="my-custom-text-field">
                                        <input type="password" class="my-custom-input" name="confirmPassword">
                                        <label class="my-custom-label" >Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <ul style="color: red" id="error_list">

                            </ul>
                        </div>
                            <div class="row">
                                <div class="col-md-12 ob-btn-login">

                                    <button class="btn btn-primary " type="submit">Proceed</button>
                                </div>
                                <div class="col-md-12">

                                    <div class="ob-sign-margin-top mt-md-0 forgot-pass ob-sign-link-href">

                                        <p class="mt-1">Already have an account? <a href="login.php">Login here</a></p>
                                    </div>

                                </div>
                            </div>
                    </div>
                </div>
            </form>

        </div>
      </div>
    </div>
  </div>
</section>
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
        $(document).ready(function (){
            $('#form').validate({
                rules: {
                    name:{
                        required:true,
                    },
                      phoneNumber:{
                        required:true,
                          number:true
                    },
                      email:{
                        required:true,
                    },
                      password:{
                        required:true,
                    },
                      confirmPassword:{
                        required:true,
                         // min:8,
                          //equalTo:'#password'
                    },

                },
                messages: {
                    name:'Name is required',
                     phoneNumber:'Phone Number is required',
                     email:'Email is required',
                     password:'Password is required',
                },
            });

            $('#form').on('submit', function (e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#form').valid()) {
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
                        let url = "{{url('register')}}"
                        swal.close();
                        console.log(response)
                        alertMsg(response.message, response['status']);
                        if(response.email){
                            window.location.replace(url+'?step='+response.step+'&email='+response.email);
                        }


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
