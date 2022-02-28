@extends('front-end.layouts.app')
@section('content')

    <!--=================================
job-grid -->
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--=================================
                    right-sidebar -->
                    <div class="row mb-4">
                        <div class="col-12 hmz-site-heading">
                            <h6 class="mb-0 ">Working Sites</h6>
                        </div>
                    </div>
                    <div class="job-filter mb-4 d-sm-flex align-items-center">
                        <div class="job-alert-bt">
                            <div class="tab-content">
                                <div class="tab-pane active" id="candidate" role="tabpanel">
                                    <form class="mt-4" id="loginForm" >
                                        <div class="row">
                                            <div class="mb-3 col-12">
                                                <div class="user-input-wrp">
                                                    <br/>
                                                    <input type="text" class="inputText" required/>
                                                    <span class="floating-label">Your email address</span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                        <div class="job-shortby ms-sm-auto d-flex align-items-center">
                            <div class="filter-btn ms-sm-3" style="width:100%"> <a class="btn btn-outline-primary" style="width:100%">Add new Site</a>
                            </div>
                        </div>
                    </div>
                    @foreach($siteDocuments as $siteDocument)
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="job-list job-grid">
                                    <div class="job-list-details">
                                        <div class="job-list-info">

                                            <div class="job-list-title">
                                                <h5 class="mb-0"><a href="#">{{$siteDocument->name}}</a></h5>
                                            </div>
                                            <div class="job-list-option">
                                                <ul class="list-unstyled">
                                                    <li> <span>Type</span> <a href="employer-detail.html">{{$siteDocument->Type}}</a> </li>

                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="job-list-favourite-time">
                                        <a class="job-list-favourite order-2" href="#"><i class="far fa-eye"></i></a>
                                        <a class="job-list-favourite order-2" href="#"><i class="far fa-edit"></i></a>
                                        <a class="job-list-favourite order-2" href="#"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 text-center mt-4">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item disabled"> <span class="page-link b-radius-none">Prev</span> </li>
                            <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">25</a></li>
                            <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--=================================
    job-grid -->

@endsection
@section('js')
    <script>

    </script>
@endsection
