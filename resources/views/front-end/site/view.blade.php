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
                        <div class="row">
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input readonly type="text" class="inputText" name="name" value="{{ old('name', $sites->name) }}">

                                    <span class="floating-label">Site Name</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input readonly type="text" class="inputText" name="address" value="{{ old('address', $sites->address) }}">

                                    <span class="floating-label">Site Address</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input readonly type="number" class="inputText" name="postalCode" value="{{ old('postal_code', $sites->postal_code) }}">

                                    <span class="floating-label">Site Postal Zip/Code</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input readonly type="text" class="inputText" name="city" value="{{ old('city', $sites->city) }}">

                                    <span class="floating-label">City</span>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <div class="user-input-wrp">
                                    <input readonly type="number" class="inputText" name="longitude" value="{{ old('longitude', $sites->longitude) }}">

                                    <span class="floating-label">Site Latitude</span>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <div class="user-input-wrp">
                                    <input readonly type="number" class="inputText" name="latitude" value="{{ old('latitude', $sites->latitude) }}">

                                    <span class="floating-label">Site longitude</span>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <div class="user-input-wrp">
                                    <input readonly type="date" name="startDate" class="inputText" value="{{ old('start_date', $sites->start_date) }}">

                                    <span class="floating-label">Start Date</span>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <div class="user-input-wrp">
                                    <input readonly type="date" class="inputText" name="finishDate" value="{{ old('start_date', $sites->finish_date) }}">

                                    <span class="floating-label">Finish Date</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ob-btn-login">
                                <button class="btn btn-primary " >Save</button>
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

@endsection
