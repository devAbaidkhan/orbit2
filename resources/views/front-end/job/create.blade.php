@extends('front-end.layouts.app')
@section('content')
    <section class="space-ptb bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="text-primary">Post a New Job</h2>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class=" justify-content-center">
                        <ul class="nav nav-tabs nav-tabs-03 justify-content-center d-sm-flex text-center" id="myTab"
                            role="tablist">
                            <li class="flex-fill">
                                <a class="nav-item active" id="Job-detail-tab" data-toggle="tab" href="#Job-detail"
                                   role="tab" aria-controls="Job-detail" aria-selected="false">
                                    <div class="feature-info-icon mb-3">
                                        <i class="flaticon-suitcase"></i>
                                    </div>
                                    <span>Job Detail</span>
                                </a>
                            </li>
                            <li class="flex-fill">
                                <a class="nav-item"  data-toggle="tab" href="#Package" role="tab"
                                   aria-controls="Package" aria-selected="false">
                                    <div class="feature-info-icon mb-3">
                                        <i class="flaticon-businessman"></i>
                                    </div>
                                    <span>Package &amp; Payments</span>
                                </a>
                            </li>
                            <li class="flex-fill">
                                <a class="nav-item"  data-toggle="tab" href="#Confirm" role="tab"
                                   aria-controls="Confirm" aria-selected="false">
                                    <div class="feature-info-icon mb-3">
                                        <i class="flaticon-tick"></i>
                                    </div>
                                    <span>Confirmation</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade active show" id="Job-detail" role="tabpanel" aria-labelledby="Job-detail-tab">
            <section class="space-ptb">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form class="row">
                                {{csrf_field()}}
                                <div class="form-group col-md-12 mb-3">
                                    <label class="mb-2">Job Title *</label>
                                    <input type="text" class="form-control" value="" placeholder="Enter a Title">
                                </div>
                                <div class="form-group col-md-12 select-border mb-3">
                                    <label class="mb-2">Select Site</label>
                                    <select class="form-control basic-select">
                                        <option value="value 01">Howdy Bridge</option>
                                        <option value="value 02">Theme park</option>
                                        <option value="value 03">IT Towers</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <label class="mb-2">Description *</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="mb-2">Time In *</label>
                                    <input type="text" class="form-control" id="timepicker" placeholder="In Time"/>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="mb-2">Time Out *</label>
                                    <input type="text" class="form-control" id="timepicker" placeholder="In Time"/>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="mb-2">Break Time Starts *</label>
                                    <input type="text" class="form-control" id="timepicker" placeholder="In Time"/>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="mb-2">Break Time Ends *</label>
                                    <input type="text" class="form-control" id="timepicker" placeholder="In Time"/>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="mb-2">Job Start Date *</label>
                                    <input type="text" class="form-control" id="timepicker" placeholder="In Time"/>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="mb-2">Job End Date *</label>
                                    <input type="text" class="form-control" id="timepicker" placeholder="In Time"/>
                                </div>

                            </form>
                        </div>
                    </div>


                    <div class="form-group col-12 mt-3 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="accepts-01">
                            <label class="form-check-label ps-1" for="accepts-01">You accept our Terms and Conditions
                                and Privacy Policy</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a class="btn btn-primary" href="#">Post Job</a>
                    </div>
                </div>
            </section>
        </div>
        <div class="tab-pane fade show" id="Package" data-toggle="tab">
        @include('front-end.job.includes.create-step-3')
        </div>
        <div class="tab-pane fade show" id="Confirm"  data-toggle="tab">
        @include('front-end.job.includes.create-step-2')
        </div>
    </div>






    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-angle-up"></i>
    </div>

@endsection
@section('js')
    <script>

    </script>
@endsection
