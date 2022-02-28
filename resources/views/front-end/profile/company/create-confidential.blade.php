@extends('front-end.layouts.app')
@section('content')
<section class="space-ptb">
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane active" id="candidate" role="tabpanel">
                <div class="row mb-4">
                    <div class="col-12 hmz-site-heading">
                        <h4 class="mb-0">Confidential Information</h4>
                    </div>
                </div>
                <form class="mt-4" id="form">
                    <div class="row">
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input maxlength="31" type="text" class="inputText EnterOnlyNumber" value="{{$user->registration_no}}" name="registrationNo">

                                <span class="floating-label">Registration No</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input maxlength="31" type="text" class="inputText EnterOnlyNumber" value="{{$user->vat_no}}" name="vatNo">

                                <span class="floating-label">VAT Number</span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 ob-btn-login">
                            <button class="btn btn-primary " >Save</button>
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
                    registrationNo:{
                        required:true,
                        maxlength: 30,
                    },
                    vatNo:{
                        required:true,
                        maxlength: 30,
                    },
                },
                messages: {
                    registrationNo:{
                        required: 'Registration No is required',
                        maxlength: "Registration No must be less than 30 characters"
                    },
                    vatNo:{
                        required:'Vat No Number is required',
                        maxlength: "Vat No Number must be less than 30 characters"
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
                let route = "{{route('confidential.update',['id'=>':id'])}}";
                route = route.replace(':id', id);
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
