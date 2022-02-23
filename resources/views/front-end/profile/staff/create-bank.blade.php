@extends('front-end.layouts.app')
@section('content')
<section class="space-ptb">
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane active" id="candidate" role="tabpanel">
                <form class="mt-4" id="form">
                    @if($bankDetail)
                    <div class="row">
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="number" class="inputText" value="{{$bankDetail->bank_name}}" name="bankName">

                                <span class="floating-label">Bank Name</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="text" class="inputText" value="{{$bankDetail->account_title}}" name="accountTitle">

                                <span class="floating-label">Account Title</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="number" class="inputText" value="{{$bankDetail->account_number}}" name="accountNumber">

                                <span class="floating-label">Account Number</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="number" class="inputText" value="{{$bankDetail->short_code}}" name="shortCode">

                                <span class="floating-label">Short Code</span>
                            </div>
                        </div>

                    </div>
                    @else
                        <div class="row">
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="number" class="inputText" value="" name="bankName">

                                    <span class="floating-label">Bank Name</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="text" class="inputText" value="" name="accountTitle">

                                    <span class="floating-label">Account Title</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="number" class="inputText" value="" name="accountNumber">

                                    <span class="floating-label">Account Number</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="number" class="inputText" value="" name="shortCode">

                                    <span class="floating-label">Short Code</span>
                                </div>
                            </div>

                        </div>
                        @endif
                    <input type="hidden" name="userId" value="{{auth()->id()}}">
                    <div class="row">
                        <div class="col-md-12 ob-btn-login">
                            <button class="btn btn-primary " id="save" >Save</button>
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
                    bankName:{
                        required:true,
                    },
                    accountTitle:{
                        required:true,
                    },
                    accountNumber:{
                        required:true,
                    },
                    shortCode:{
                        required:true,
                    },

                },
                messages: {
                    bankName:'Bank Name  is required',
                    accountTitle:'Account Title is required',
                    accountNumber:'Account Number is required',
                    shortCode:'Short Code is required',
                },
            });

            $('#form').on('submit', function (e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#form').valid() ) {
                    return false;
                }
                let route = "{{url('staff/bank/store')}}";
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
