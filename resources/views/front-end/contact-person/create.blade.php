@extends('front-end.layouts.app')
@section('content')

<!--=================================
Signin -->
<section class="space-ptb bg-light" style="padding:40px 0px">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="section-title text-center">
        <h2 style="color:#8b4e9f">Contact Person</h2>
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
                        <div class="mb-3 col-3">
                            <div class="my-custom-text-field">
                                <select name="title" id="title" class="form-control my-custom-input">
                                    <option value=""  >select title</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Ms">Ms</option>
                                </select>
                            </div>
                        </div>
                    <div class="mb-3 col-9">
                        <div class="my-custom-text-field">
                        <input type="text" class="my-custom-input form-control" name="name">
                        <label class="my-custom-label">Name</label>
                        </div>
                    </div>

                    <div class="mb-3 col-12">
                        <div class="my-custom-text-field">
                        <input type="email" class="my-custom-input form-control" name="email">
                        <label class="my-custom-label">Email</label>
                        </div>
                    </div>

                        <div class="mb-3 col-12">
                        <div class="my-custom-text-field">
                        <input type="text" class="my-custom-input form-control" name="jobTitle">
                        <label class="my-custom-label">Job Title</label>
                        </div>
                    </div>
                    <div class="mb-3 col-12">
                        <div class="my-custom-text-field">
                        <input type="number" class="my-custom-input form-control" name="phoneNumber">
                        <label class="my-custom-label">Phone Number</label>
                        </div>
                    </div>
                    <div class="mb-3 col-12">
                        <div class="my-custom-text-field">
                        <input type="text" class="my-custom-input form-control" name="address">
                        <label class="my-custom-label">Address</label>
                        </div>
                    </div>
                    <div class="mb-3 col-12">
                        <div class="my-custom-text-field">
                        <input type="number" class="my-custom-input form-control" name="postalCode">
                        <label class="my-custom-label">Site Postal Zip/Code</label>
                        </div>
                    </div>
                        <input type="hidden" name="contactable_id" value="{{auth()->id()}}">
                    </div>
                    <div class="row">
                        <div class="col-md-12 ob-btn-login">
                            <button class="btn btn-primary">Save</button>
                        </div>
@csrf
                    </div>
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
                    address:{
                        required:true,
                    },
                    title:{
                        required:true,
                    },
                    jobTitle:{
                        required:true,
                    },
                    phoneNumber:{
                        required:true,
                    },
                    postalCode:{
                        required:true,
                        number:true
                    },
                    email:{
                        required:true,
                    },
                },
                messages: {
                    name:'Name is required',
                    phoneNumber:'Phone Number is required',
                    address:'Address is required',
                    postalCode:'Postal Code is required',
                    email:'Email is required',
                    title:'Title  is required',
                    jobTitle:'Job Title  is required',
                },
            });

            $('#form').on('submit', function (e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#form').valid() ) {
                    return false;
                }
                let route = "{{route('contact-person.store')}}";
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
