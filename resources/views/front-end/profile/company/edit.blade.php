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

                        <div class="my-custom-text-field">
                        <input type="text" class="my-custom-input" name="name" value="{{$user->name}}">
                        <label class="my-custom-label">Name</label>
                        </div>
                    </div>
                    <div class="mb-3 col-12">
                        <div class="my-custom-text-field">
                        <input type="number" class="my-custom-input" name="phoneNumber" value="{{$user->phone_number}}">
                        <label class="my-custom-label" >Phone Number</label>
                        </div>
                    </div>
                    <div class="mb-3 col-12">
                        <div class="my-custom-text-field">
                        <input type="text" class="my-custom-input" name="officeNumber" value="{{$user->office_number}}">
                        <label class="my-custom-label">Office Number</label>
                        </div>
                    </div>
                    <div class="mb-3 col-12">
                        <div class="my-custom-text-field">
                        <input type="text" class="my-custom-input" disabled name="email" value="{{$user->email}}">
                        <label class="my-custom-label">Email</label>
                        </div>
                    </div>
                    <div class="mb-3 col-12">
                        <div class="my-custom-text-field">
                        <input type="text" class="my-custom-input" name="address" value="{{$user->address}}">
                        <label class="my-custom-label">Address</label>
                        </div>
                    </div>
                    <div class="mb-3 col-6">
                        <div class="my-custom-text-field">
                        <input type="text" class="my-custom-input" name="country" value="{{$user->country}}">
                        <label class="my-custom-label">Country</label>
                        </div>
                    </div>
                    <div class="mb-3 col-6">
                        <div class="my-custom-text-field"  >
                        <input type="text" class="my-custom-input" name="city" value="{{$user->city}}">
                        <label class="my-custom-label">City</label>
                        </div>
                    </div>
                    <div class="mb-3 col-12">
                        <div class="my-custom-text-field">
                        <input type="number" class="my-custom-input" name="postalCode" value="{{$user->postal_code}}">
                        <label class="my-custom-label">Postal Code</label>
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

