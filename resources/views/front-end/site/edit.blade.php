@extends('front-end.layouts.app')
@section('content')

    <!--=================================
Signin -->
    <section class="space-ptb bg-light" style="padding:40px 0px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 style="color:#8b4e9f">Site Detail</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-ptb">
        <div class="container">
            <div class="tab-content">
                <div class="row">
                </div>
                <div class="tab-pane active" id="candidate" role="tabpanel">
                    <form class="mt-4" id="form">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="text" class="inputText" name="name" value="{{ old('name', $sites->name) }}">

                                    <span class="floating-label">Site Name</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="text" class="inputText" name="address" value="{{ old('address', $sites->address) }}">

                                    <span class="floating-label">Site Address</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input  type="number" class="inputText" name="postalCode" value="{{ old('postal_code', $sites->postal_code) }}">

                                    <span class="floating-label">Site Postal Zip/Code</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input  type="text" class="inputText" name="city" value="{{ old('city', $sites->city) }}">

                                    <span class="floating-label">City</span>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <div class="user-input-wrp">
                                    <input  type="number" class="inputText" name="longitude" value="{{ old('longitude', $sites->longitude) }}">

                                    <span class="floating-label">Site Latitude</span>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <div class="user-input-wrp">
                                    <input  type="number" class="inputText" name="latitude" value="{{ old('latitude', $sites->latitude) }}">

                                    <span class="floating-label">Site longitude</span>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <div class="user-input-wrp">
                                    <input  type="date" name="startDate" class="inputText" value="{{ old('start_date', $sites->start_date) }}">

                                    <span class="floating-label">Start Date</span>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <div class="user-input-wrp">
                                    <input  type="date" class="inputText" name="finishDate" value="{{ old('start_date', $sites->finish_date) }}">

                                    <span class="floating-label">Finish Date</span>
                                </div>
                            </div>
                            <input type="hidden" name="contactable_id" id="contactable_id" value="{{ old('id', $sites->id) }}">
                        </div>
                        <div class="row">
                            <div class="col-md-12 ob-btn-login">
                                <button class="btn btn-primary">Save</button>
                            </div>

                        </div>

                    </form>

                    <div class="ob-sign-margin-top mt-md-0 forgot-pass ob-sign-link-href">
                        <p class="mt-1"><i class="fa fa-arrow-left"></i><a onclick="location.replace(document.referrer);"> Back</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
    Signin -->

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#form').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                    startDate: {
                        required: true,
                    },
                    finishDate: {
                        required: true,
                    },
                    postalCode: {
                        required: true,
                        number: true
                    },
                    longitude: {
                        required: true,
                        number: true
                    },
                    latitude: {
                        required: true,
                        number: true
                    },
                },
                messages: {
                    name: 'Name is required',
                    phoneNumber: 'Phone Number is required',
                    password: 'Password is required',
                    address: 'Address is required',
                    country: 'Country is required',
                    city: 'City is required',
                    postalCode: 'Postal Code is required',
                },
            });
            $('#form').on('submit', function (e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#form').valid()) {
                    return false;
                }
                var id = $('#contactable_id').val();
                var route = "{{route('sites.update',['site'=>':site'])}}";
                route = route.replace(':site', id);
                console.log(route);
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
                        window.location.reload();
                        swal.close();
                        console.log(response)
                        alertMsg(response.message, response['status']);
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
