@extends('front-end.layouts.app')
@section('content')
<section class="space-ptb">
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane active" id="candidate" role="tabpanel">
                <form class="mt-4" id="form">
                    @if($passportDetail)
                    <div class="row">
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="number" class="inputText" value="{{$passportDetail->passport_no}}" name="passportNo">

                                <span class="floating-label">Passport No.</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="text" class="inputText" value="{{$passportDetail->issued_country}}" name="issuedCountry">

                                <span class="floating-label">Country of Issue</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="date" class="inputText" value="{{\Carbon\Carbon::parse($passportDetail->issue_date)->format('Y-m-d')}}" name="issueDate">

                                <span class="floating-label">Date of Issue</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="date" class="inputText" value="{{\Carbon\Carbon::parse($passportDetail->expiry_date)->format('Y-m-d')}}" name="expiryDate">

                                <span class="floating-label">Date of Expiry</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="text" class="inputText" value="{{$passportDetail->visa_need}}" name="visaNeed">

                                <span class="floating-label">Visa Need</span>
                            </div>
                        </div>

                    </div>
                    @else
                        <div class="row">
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="number" class="inputText" value="" name="passportNo">

                                    <span class="floating-label">Passport No.</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="text" class="inputText" value="" name="issuedCountry">

                                    <span class="floating-label">Country of Issue</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="date" class="inputText" value="" name="issueDate">

                                    <span class="floating-label">Date of Issue</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="date" class="inputText" value="" name="expiryDate">

                                    <span class="floating-label">Date of Expiry</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="text" class="inputText" value="" name="visaNeed">

                                    <span class="floating-label">Visa Need</span>
                                </div>
                            </div>

                        </div>
                        @endif
                    <input type="hidden" name="userId" value="{{auth()->id()}}">
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
                    passportNo:{
                        required:true,
                    },
                    issuedCountry:{
                        required:true,
                    },
                    issueDate:{
                        required:true,
                    },
                    expiryDate:{
                        required:true,
                    },
                    visaNeed:{
                        required:true,
                    },

                },
                messages: {
                    passportNo:'Passport No  is required',
                    issuedCountry:'Issued Country is required',
                    issueDate:'Issue Date is required',
                    expiryDate:'Expiry Date is required',
                    visaNeed:'Visa Need is required',
                },
            });

            $('#form').on('submit', function (e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#form').valid() ) {
                    return false;
                }
                let route = "{{url('staff/passport/store')}}";
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
