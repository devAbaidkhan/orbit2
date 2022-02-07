@extends('front-end.layouts.app')
@section('content')
    <div class="header-inner bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="candidates-user-info">
                        <div class="jobber-user-info">
                            <div class="profile-avatar">
                                <img class="img-fluid image" id="refresh_image"
                                     src="{{asset('/users/images/'.Auth::user()->avatar)}}" alt="profile_image">
                                <input type="file" id="image" name="image" style="display:none">
                                <a href="javascript:void (0)" id="change_picture_btn"><i class="fas fa-pencil-alt"></i></a>
                            </div>
                            <div class="profile-avatar-info ms-4">
                                <h3>Felica Queen</h3>
                                <p style="padding: 10px;">Visit <a href="company-dashboard.php">Dashboard</a> to complete your Profile.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:85%" aria-valuenow="85"
                             aria-valuemin="0" aria-valuemax="100">
                            <span class="progress-bar-number">85%</span>
                        </div>
                    </div>
                    <div class="candidates-skills">
                        <div class="candidates-skills-info">
                            <h3 class="text-primary">85%</h3>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--=================================
    inner banner -->

    <section class="space-ptb">
        <div class="container">
            <div class="row mb-3 mb-lg-5 mt-3 mt-lg-0">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="candidates-feature-info bg-dark">
                        <div class="candidates-info-icon text-white">
                            <i class="fas fa-globe-asia"></i>
                        </div>
                        <div class="candidates-info-content">
                            <h6 class="candidates-info-title text-white">Total Jobs Posted</h6>
                        </div>
                        <div class="candidates-info-count">
                            <h3 class="mb-0 text-white">01</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="candidates-feature-info bg-success">
                        <div class="candidates-info-icon text-white">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                        <div class="candidates-info-content">
                            <h6 class="candidates-info-title text-white">Active Jobs</h6>
                        </div>
                        <div class="candidates-info-count">
                            <h3 class="mb-0 text-white">00</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="candidates-feature-info bg-danger">
                        <div class="candidates-info-icon text-white">
                            <i class="fas fa-thumbs-down"></i>
                        </div>
                        <div class="candidates-info-content">
                            <h6 class="candidates-info-title text-white">Not Approved</h6>
                        </div>
                        <div class="candidates-info-count">
                            <h3 class="mb-0 text-white">00</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!--=================================
                sidebar -->
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="search">
                                <i class="fas fa-search"></i>
                                <input class="form-control" type="text" placeholder="Search Keywords">
                            </div>
                        </div>
                    </div>
                </div>
                <!--=================================
                sidebar -->
                <div class="col-lg-9" style="padding-bottom:70px;">
                    <div class="job-filter mb-4 d-sm-flex align-items-center">
                        <div class="job-alert-bt">My Posted Jobs List:</div>

                    </div>
                    <div class="employers-list">
                        <div class="employers-list-details">
                            <div class="employers-list-info">
                                <div class="employers-list-title">
                                    <h5 class="mb-0 ob-company-heading"><a href="employer-detail.html">Electrician
                                            Officer</a><a href="staff-job-listing.php"><span class="job-listing-link">- 05 Application (view)</span></a>
                                    </h5>
                                </div>
                                <div class="employers-list-option">
                                    <ul class="list-unstyled">
                                        <li>Corporate</li>
                                        <li><i class="fas fa-map-marker-alt pe-1"></i>Monday to Friday 0800-1700.
                                            Officer should be smart, professional and
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="employers-list-position">
                            <a class="btn btn-primary btn-job-font" href="#">17 position</a>
                            <p>2$/per hour</p>
                        </div>
                    </div>
                    <div class="employers-list">
                        <div class="employers-list-details">
                            <div class="employers-list-info">
                                <div class="employers-list-title">
                                    <h5 class="mb-0 ob-company-heading"><a href="employer-detail.html">Officer</a><a
                                            href="staff-job-listing.php"><span class="job-listing-link">- 05 Application (view)</span></a>
                                    </h5>
                                </div>
                                <div class="employers-list-option">
                                    <ul class="list-unstyled">
                                        <li>Corporate</li>
                                        <li><i class="fas fa-map-marker-alt pe-1"></i>Monday to Friday 0800-1700.
                                            Officer should be smart, professional and
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="employers-list-position">
                            <a class="btn btn-primary btn-job-font" href="#">17 position</a>
                            <p>2$/per hour</p>
                        </div>
                    </div>
                    <div class="employers-list">
                        <div class="employers-list-details">
                            <div class="employers-list-info">
                                <div class="employers-list-title">
                                    <h5 class="mb-0 ob-company-heading"><a href="employer-detail.html">Protocol
                                            Officer</a><a href="staff-job-listing.php"><span class="job-listing-link">- 05 Application (view)</span></a>
                                    </h5>
                                </div>
                                <div class="employers-list-option">
                                    <ul class="list-unstyled">
                                        <li>Corporate</li>
                                        <li><i class="fas fa-map-marker-alt pe-1"></i>Monday to Friday 0800-1700.
                                            Officer should be smart, professional and
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="employers-list-position">
                            <a class="btn btn-primary btn-job-font" href="#">17 position</a>
                            <p>2$/per hour</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <!--=================================
    Back To Top-->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-angle-up"></i>
    </div>
    <!--=================================
    Back To Top-->

    <!--=================================
    Signin Modal Popup -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header p-4">
                    <h4 class="mb-0 text-center">Login to Your Account</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="login-register">
                        <fieldset>
                            <legend class="px-2">Choose your Account Type</legend>
                            <ul class="nav nav-tabs nav-tabs-border d-flex" role="tablist">
                                <li class="nav-item me-4">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#candidate" role="tab"
                                       aria-selected="false">
                                        <div class="d-flex">
                                            <div class="tab-icon">
                                                <i class="flaticon-users"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">Candidate</h6>
                                                <p class="mb-0">Log in as Candidate</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#employer" role="tab"
                                       aria-selected="false">
                                        <div class="d-flex">
                                            <div class="tab-icon">
                                                <i class="flaticon-suitcase"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">Employer</h6>
                                                <p class="mb-0">Log in as Employer</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </fieldset>
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                                <form class="mt-4">
                                    <div class="row">
                                        <div class="form-group col-12 mb-3">
                                            <label class="form-label" for="Email2">Username / Email Address:</label>
                                            <input type="text" class="form-control" id="Email22">
                                        </div>
                                        <div class="form-group col-12 mb-3">
                                            <label class="form-label" for="password2">Password*</label>
                                            <input type="password" class="form-control" id="password32">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-grid" href="#">Sign In</a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ms-md-3 mt-3 mt-md-0 forgot-pass">
                                                <a href="#">Forgot Password?</a>
                                                <p class="mt-1">Don't have account? <a href="register.html">Sign Up
                                                        here</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="employer" role="tabpanel">
                                <form class="mt-4">
                                    <div class="row">
                                        <div class="form-group col-12 mb-3">
                                            <label class="form-label" for="Email2">Username / Email Address:</label>
                                            <input type="text" class="form-control" id="Email2">
                                        </div>
                                        <div class="form-group col-12 mb-3">
                                            <label class="form-label" for="password2">Password*</label>
                                            <input type="password" class="form-control" id="password2">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-grid" href="#">Sign In</a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ms-md-3 mt-3 mt-md-0">
                                                <a href="#">Forgot Password?</a>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="Remember-02">
                                                    <label class="form-check-label" for="Remember-02">Remember
                                                        Password</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-4">
                            <fieldset>
                                <legend class="px-2">Login or Sign up with</legend>
                                <div class="social-login">
                                    <ul class="list-unstyled d-flex mb-0">
                                        <li class="facebook text-center">
                                            <a href="#"> <i class="fab fa-facebook-f me-3 me-md-4"></i>Login with
                                                Facebook</a>
                                        </li>
                                        <li class="twitter text-center">
                                            <a href="#"> <i class="fab fa-twitter me-3 me-md-4"></i>Login with
                                                Twitter</a>
                                        </li>
                                        <li class="google text-center">
                                            <a href="#"> <i class="fab fa-google me-3 me-md-4"></i>Login with Google</a>
                                        </li>
                                        <li class="linkedin text-center">
                                            <a href="#"> <i class="fab fa-linkedin-in me-3 me-md-4"></i>Login with
                                                Linkedin</a>
                                        </li>
                                    </ul>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#change_picture_btn', function () {
                $('#image').click();
            });

            $('#image').ijaboCropTool({
                preview : '#refresh_image',
                setRatio:1,
                allowedExtensions: ['jpg', 'jpeg','png'],
                buttonsText:['CROP','QUIT'],
                buttonsColor:['rgba(139, 78, 159, 0.7)','#ee5155', -15],
                processUrl:'{{ route("company.picture.update") }}',
                withCSRF:['_token','{{ csrf_token() }}'],
                onSuccess:function(message, element, status){
                    //alert(message);
                    console.log(element);
                },
                onError:function(message, element, status){
                    alert(message);
                }
            });

        });
    </script>
@endsection
