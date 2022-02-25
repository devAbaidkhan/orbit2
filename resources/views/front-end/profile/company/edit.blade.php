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
                                <input maxlength="31" type="text" class="inputText entertxtOnly" name="name" value="{{$user->name}}">
                                <span class="floating-label">Name</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input maxlength="31" type="text" class="inputText EnterOnlyNumber" name="phoneNumber" value="{{$user->phone_number}}">
                                <span class="floating-label">Phone Number</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input maxlength="31" type="text" class="inputText EnterOnlyNumber" name="officeNumber" value="{{$user->office_number}}">

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
                                <input maxlength="101"  type="text" class="inputText entertxtOnly" name="address" value="{{$user->address}}">

                                <span class="floating-label">Address</span>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <div class="user-input-wrp">
                                <input maxlength="31" type="text" class="inputText entertxtOnly" name="country" value="{{$user->country}}">

                                <span class="floating-label">Country</span>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <div class="user-input-wrp"  >
                                <input maxlength="31" type="text" class="inputText entertxtOnly" name="city" value="{{$user->city}}">

                                <span class="floating-label">City</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input maxlength="31" type="text" class="inputText EnterOnlyNumber" name="postalCode" value="{{$user->postal_code}}">

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
                        maxlength: 30,
                    },
                    phoneNumber:{
                        required:true,
                        maxlength: 30,
                    },
                    officeNumber:{
                        required:true,
                        maxlength: 30,
                    },
                    address:{
                        required:true,
                        maxlength: 100,
                    },
                    country:{
                        required:true,
                        maxlength: 30,
                    },
                    city:{
                        required:true,
                        maxlength: 30,
                    },
                    postalCode:{
                        required:true,
                        maxlength: 30,
                    },
                },
                messages: {
                    name:{
                        required: "Name is required",
                        maxlength: "Name must be less than 30 characters"
                    },
                    phoneNumber:{
                        required:'Phone Number is required',
                        maxlength: "Phone Number must be less than 30 characters"
                    },
                    officeNumber:{
                        required:'Office Number is required',
                        maxlength: "Office Number must be less than 30 characters"
                    },
                    address:{
                        required:'Address is required',
                        maxlength: "Address must be less than 100 characters"
                    },
                    country:{
                        required:'Country is required',
                        maxlength: "Country must be less than 30 characters"
                    },
                    city:{
                        required:'City is required',
                        maxlength: "City must be less than 30 characters"
                    },
                    postalCode:{
                        required: 'Postal Code is required',
                        maxlength: "Postal Code must be less than 30 characters"
                    },
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

