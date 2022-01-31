@extends('front-end.layouts.app')
@section('content')
<section class="space-ptb">
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane active" id="candidate" role="tabpanel">
                <form class="mt-4">
                    <div class="row">
                        <div class="mb-3 col-12">
                            <div class="my-custom-text-field">
                                <input type="text" class="my-custom-input">
                                <label class="my-custom-label">Registration No.</label>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="my-custom-text-field">
                                <input type="text" class="my-custom-input">
                                <label class="my-custom-label">VAT Number</label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 ob-btn-login">
                            <a class="btn btn-primary " href="signup2.php">Save</a>
                        </div>

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
