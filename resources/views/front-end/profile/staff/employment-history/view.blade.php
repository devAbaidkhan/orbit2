@extends('front-end.layouts.app')
@section('content')

    <!--=================================
Signin -->
    <section class="staff-education-main">
        <section class="space-ptb bg-light" style="padding:10px 0px">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2>Add New Certificate</h2>
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
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="text" class="inputText" name="emp_title" value="{{ old('emp_title', $employmentHistory->emp_title) }}">
                                        <span class="floating-label">Job Title</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="text" class="inputText" name="emp_com_name" value="{{ old('emp_com_name', $employmentHistory->emp_com_name) }}">
                                        <span class="floating-label">Company Name</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="date" class="inputText" name="emp_join" value="{{ old('emp_join', $employmentHistory->emp_join) }}">
                                        <span class="floating-label">Select Joining Date</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="date" class="inputText" name="emp_ending" value="{{ old('emp_ending', $employmentHistory->emp_ending) }}">
                                        <span class="floating-label">Select Ending Date</span>
                                        </br>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="text" class="inputText" name="emp_reason" value="{{ old('emp_reason', $employmentHistory->emp_reason) }}">
                                        <span class="floating-label">Reason of leaving</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="text" class="inputText" name="emp_postal" value="{{ old('emp_postal', $employmentHistory->emp_postal) }}">
                                        <span class="floating-label">Zip Code/Postal Code</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="text" class="inputText" name="emp_comp_address" value="{{ old('emp_comp_address', $employmentHistory->emp_comp_address) }}">
                                        <span class="floating-label">Company Address</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="text" class="inputText" name="emp_contact_name" value="{{ old('emp_contact_name', $employmentHistory->emp_contact_name) }}">
                                        <span class="floating-label">Contact Person Name</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="text" class="inputText" name="phone_number" value="{{ old('phone_number', $employmentHistory->phone_number) }}">
                                        <span class="floating-label">Contact Person Number</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="email" class="inputText" name="email" value="{{ old('email', $employmentHistory->email) }}">
                                        <span class="floating-label">Contact Person Email</span>
                                    </div>
                                </div>
                                <input type="hidden" name="contactable_id" id="contactable_id" value="{{ old('id', $employmentHistory->id) }}">
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
    </section>


@endsection

@section('js')

@endsection
