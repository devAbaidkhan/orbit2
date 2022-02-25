@extends('front-end.layouts.app')
@section('content')
<section class="space-ptb bg-light" style="padding:40px 0px">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="section-title text-center">
        <h2 style="color:#8b4e9f">Company Profile</h2>
       </div>
      </div>
    </div>
  </div>
</section>
<section class="space-ptb">
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane active" id="candidate" role="tabpanel">
                <form class="mt-4" id="form" >
                    <div class="row">
                    <div class="mb-3 col-12">

                            <div class="user-input-wrp">
                                <input type="text" class="inputText" name="name" value="{{$user->name}}">
                                <span class="floating-label">Name</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="number" class="inputText" name="phoneNumber" value="{{$user->phone_number}}">
                                <span class="floating-label">Phone Number</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="text" class="inputText" name="officeNumber" value="{{$user->office_number}}">

                                <span class="floating-label">Office Number</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="text" class="inputText" name="email" disabled value="{{$user->email}}">

                                <span class="floating-label">Email</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="text" class="inputText" name="address" value="{{$user->address}}">

                                <span class="floating-label">Address</span>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <div class="user-input-wrp">
                                <input type="text" class="inputText" name="country" value="{{$user->country}}">

                                <span class="floating-label">Country</span>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <div class="user-input-wrp"  >
                                <input type="text" class="inputText" name="city" value="{{$user->city}}">

                                <span class="floating-label">City</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="number" class="inputText" name="postalCode" value="{{$user->postal_code}}">

                                <span class="floating-label">Postal Code</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ob-btn-login">
                            <button class="btn btn-primary " >Save</button>
                        </div>

                    </div>
                    @csrf
                </form>

                <div class="ob-sign-margin-top mt-md-0 forgot-pass ob-sign-link-href">
                      <p class="mt-1"><i class="fa fa-arrow-left"></i><a onclick="history.back()"> Back</a></p>
                    </div>
            </div>
        </div>
    </div>
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
                let id = "{{auth()->id()}}"
                let route = "{{route('company.update',['company'=>':company'])}}";
                route = route.replace(':company', id);
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

