@extends('front-end.layouts.app')
@section('content')
<section class="space-ptb">
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane active" id="candidate" role="tabpanel">
                <form class="mt-4" id="form">
                    <div class="row">
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="number" class="inputText" value="" name="">

                                <span class="floating-label">Name</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="text" class="inputText" value="" name="">

                                <span class="floating-label">Phone Number</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="text" class="inputText" value="" name="">

                                <span class="floating-label">Relation</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="text" class="inputText" value="" name="">

                                <span class="floating-label">Zip Code/ Postal Code</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="user-input-wrp">
                                <input type="text" class="inputText" value="" name="">

                                <span class="floating-label">Address</span>
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
