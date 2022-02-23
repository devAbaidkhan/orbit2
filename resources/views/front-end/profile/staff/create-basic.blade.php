@extends('front-end.layouts.app')
@section('content')
<section class="staff-profile-main">
    <section class="space-ptb bg-light" style="padding:10px 0px">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="section-title text-center">
            <h2>Basic Profile</h2>
           </div>
          </div>
        </div>
      </div>
    </section>
    <section class="space-ptb">
        <div class="container">
            <div class="tab-content">
                <div class="tab-pane active" id="candidate" role="tabpanel">
                    <form class="mt-4" id="form">
                        <div class="row">
                            <div class="jobber-user-info staff-basic-profile-img">
                                <div class="profile-avatar">
                                    <img class="img-fluid " src="{{asset($user->avatar)}}" alt="">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
{{--                            <div class="mb-3 col-12">--}}
{{--                                <div class="user-input-wrp">--}}
{{--                                    <input type="text" class="inputText" name="firstName">--}}
{{--                                    <span class="floating-label">First Name</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="text" class="inputText" name="name" value="{{$user->name}}">
                                    <span class="floating-label">Name</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="text" class="inputText" value="{{$user->phone_number}}" name="phoneNumber">
                                    <span class="floating-label">Phone Number</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="email" class="inputText" disabled value="{{$user->email}}" name="email">
                                    <span class="floating-label">Email ID</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="text" class="inputText" value="{{$user->country}}" name="country">
                                    <span class="floating-label">Select your Country</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="text" class="inputText" value="{{$user->city}}" name="city">
                                    <span class="floating-label">Select your City</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="number" class="inputText" value="{{$user->postal_code}}" name="postalCode">
                                    <span class="floating-label">Postal Code</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="text" class="inputText" value="{{$user->address}}" name="address">
                                    <span class="floating-label">Enter Address</span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="userId" value="{{$user->id}}">
                        <div class="row">
                            <div class="col-md-12 ob-btn-login">
                                <button class="btn btn-primary " id="save">Save</button>
                            </div>
@csrf
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</section>

@endsection

@section('js')
    <script>
        $(document).ready(function (){
            $('#form').validate({
                rules: {
                    name:{
                        required:true,
                    },
                    email:{
                        required:true,
                    },
                    phoneNumber:{
                        required:true,
                        number:true
                    },
                    officeNumber:{
                        required:true,
                    },
                    address:{
                        required:true,
                    },
                    country:{
                        required:true,
                    },
                    city:{
                        required:true,
                    },
                    postalCode:{
                        required:true,
                    },
                },
                messages: {
                    name:'Name is required',
                    email:'Email is required',
                    phoneNumber:'Phone Number is required',
                    password:'Password is required',
                    address:'Address is required',
                    country:'Country is required',
                    city:'City is required',
                    postalCode:'Postal Code is required',
                },
            });

            $('#form').on('submit', function (e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#form').valid() ) {
                    return false;
                }
                let route = "{{url('staff/basic/store')}}";
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
    </script>
@endsection
