@extends('front-end.layouts.app')
@section('content')
<section class="staff-profile-main">
    <section class="space-ptb bg-light" style="padding:10px 0px">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="section-title text-center">
            <h2>Confidential Info.</h2>
           </div>
          </div>
        </div>
      </div>
    </section>
    <section class="space-ptb">
        <div class="container">
            <div class="tab-content staff-confidential-form">
                <div class="tab-pane active" id="candidate" role="tabpanel">
                    <form class="mt-4" id="form">
                        @if($confidentialDetail)
                        <div class="row">
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="number" class="inputText" value="{{$confidentialDetail->sia_number}}"  name="siaNumber">
                                    <span class="floating-label">SIA Number</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="number" class="inputText" value="{{$confidentialDetail->sia_role}}"  name="siaRole">
                                    <span class="floating-label">SIA Role</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="text" class="inputText" value="{{$confidentialDetail->licence_sector}}" name="licenseSector">
                                    <span class="floating-label">License Sector</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="date" class="inputText" value="{{$confidentialDetail->expiry_date}}" name="expiryDate">
                                    <span class="floating-label">Expiry Date</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="number" class="inputText" value="{{$confidentialDetail->pay_rate}}" name="payRate">
                                    <span class="floating-label">Pay Rate in GBP</span>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="number" class="inputText"  name="siaNumber">
                                        <span class="floating-label">SIA Number</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="number" class="inputText"   name="siaRole">
                                        <span class="floating-label">SIA Role</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="text" class="inputText"  name="licenseSector">
                                        <span class="floating-label">License Sector</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="date" class="inputText"  name="expiryDate">
                                        <span class="floating-label">Expiry Date</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input type="number" class="inputText" name="payRate">
                                        <span class="floating-label">Pay Rate in GBP</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @csrf
                        <input type="hidden" name="userId" value="{{auth()->id()}}">
                        <div class="row">
                            <div class="col-md-12 ob-btn-login">
                                <button class="btn btn-primary" id="save" >Save</button>
                            </div>
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
                    siaNumber:{
                        required:true,
                    },
                    siaRole:{
                        required:true,
                        number:true
                    },
                    licenseSector:{
                        required:true,
                    },
                    expiryDate:{
                        required:true,
                    },
                    payRate:{
                        required:true,
                    },

                },
                messages: {
                    siaNumber:'Sia Number is required',
                    siaRole:'Sia Role  is required',
                    licenseSector:'License Sector is required',
                    expiryDate:'Expiry Date is required',
                    payRate:'Pay Rate is required',
                },
            });

            $('#form').on('submit', function (e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#form').valid() ) {
                    return false;
                }
                let route = "{{url('staff/confidential/store')}}";
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
