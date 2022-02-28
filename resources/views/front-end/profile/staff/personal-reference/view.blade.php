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
                            <h2>Add New Personal Reference</h2>
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
                                        <input readonly type="text" class="inputText" name="ref_name" value="{{ old('ref_name', $personalReference->ref_name) }}">
                                        <span class="floating-label">Enter Person's Name</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="text" class="inputText" name="ref_num" value="{{ old('ref_num', $personalReference->ref_num) }}">
                                        <span class="floating-label">Mobile Number</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="email" class="inputText" name="ref_email" value="{{ old('ref_email', $personalReference->ref_email) }}">
                                        <span class="floating-label">Email Address</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="text" class="inputText" name="ref_rel" value="{{ old('ref_rel', $personalReference->ref_rel) }}">
                                        <span class="floating-label">Relation</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="text" class="inputText" name="ref_occup" value="{{ old('ref_occup', $personalReference->ref_occup) }}">
                                        <span class="floating-label">Occupation</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="text" class="inputText" name="ref_long" value="{{ old('ref_long', $personalReference->ref_long) }}">
                                        <span class="floating-label">How Long you Know</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="text" class="inputText" name="ref_postal" value="{{ old('ref_postal', $personalReference->ref_postal) }}">
                                        <span class="floating-label">Postal Code</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="user-input-wrp">
                                        <input readonly type="text" class="inputText" name="ref_address" value="{{ old('ref_address', $personalReference->ref_address) }}">
                                        <span class="floating-label">Enter Address</span>
                                    </div>
                                </div>
                                <input type="hidden" name="contactable_id" id="contactable_id" value="{{ old('id', $personalReference->id) }}">
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
