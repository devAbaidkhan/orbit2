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
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-3">
                                <div class="user-input-wrp">
                                    <select disabled name="title" id="title" class="inputText">
                                        <option value=""  >select title</option>
                                        <option value="Mr" {{old('gender',$contactPerson->title) == 'Mr' ? 'selected': ''}}>Mr</option>
                                        <option value="Mrs" {{old('gender',$contactPerson->title) == 'Mrs' ? 'selected': ''}}>Mrs</option>
                                        <option value="Miss" {{old('gender',$contactPerson->title) == 'Miss' ? 'selected': ''}}>Miss</option>
                                        <option value="Ms" {{old('gender',$contactPerson->title) == 'Ms' ? 'selected': ''}}>Ms</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-9">
                                <div class="user-input-wrp">
                                    <input readonly  type="text" class="inputText" name="name" value="{{ old('name', $contactPerson->name) }}">

                                    <span class="floating-label">Name</span>
                                </div>
                            </div>

                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input  readonly type="email" class="inputText" name="email" value="{{ old('name', $contactPerson->email) }}">

                                    <span class="floating-label">Email</span>
                                </div>
                            </div>

                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input readonly  type="text" class="inputText" name="jobTitle" value="{{ old('name', $contactPerson->job_title) }}">

                                    <span class="floating-label">Job Title</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input readonly  type="number" class="inputText" name="phoneNumber" value="{{ old('name', $contactPerson->phone_number) }}">

                                    <span class="floating-label">Phone Number</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input readonly  type="text" class="inputText" name="address" value="{{ old('name', $contactPerson->address) }}">

                                    <span class="floating-label">Address</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input  readonly type="number" class="inputText" name="postalCode" value="{{ old('name', $contactPerson->postal_code) }}">

                                    <span class="floating-label">Site Postal Zip/Code</span>
                                </div>
                            </div>
                            <input type="hidden" name="contactable_id" id="contactable_id" value="{{auth()->id()}}">
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

@endsection
