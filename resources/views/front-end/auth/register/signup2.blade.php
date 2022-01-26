@extends('front-end.layouts.app')

<!--=================================
header -->
@section('content')

    <section class="space-ptb">
  <div class="container">
        <div class="section-title ob-login-main-heading">
            <img src="images/logo/WorkOrBit-Logo-500.png" width="220px" class="img-responsive section-title-image">
          </div>
    <div class="row align-items-center">
      <h2 class="title text-center register-heading">Register as</h2>

        <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
            <div class="ans-category-item pt-3">
                <a href="#" class="category-item p-0">
                    <div class="category-icon mb-3">
                    <i class="flaticon-account"></i>
                    </div>
                    <h6 class="ans-category-box-heading">Company</h6>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
            <div class="ans-category-item pt-3">
                <a href="#" class="category-item p-0">
                    <div class="category-icon mb-3 text-center">
                    <i class="flaticon-conversation"></i>
                    </div>
                    <h6 class="ans-category-box-heading">Agency</h6>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
            <div class="ans-category-item pt-3">
                <a href="#" class="category-item p-0">
                    <div class="category-icon mb-3">
                    <i class="flaticon-money"></i>
                    </div>
                    <h6 class="ans-category-box-heading">Subcontractor</h6>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
            <div class="ans-category-item pt-3">
                <a href="#" class="category-item p-0">
                    <div class="category-icon mb-3">
                    <i class="flaticon-mortarboard"></i>
                    </div>
                    <h6 class="ans-category-box-heading">Staff</h6>
                </a>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 ob-btn-login">
        <a class="btn btn-primary " href="company-profile-dashboard.php">Register</a>
        </div>
        <div class="col-md-12">

        <div class="ob-sign-margin-top mt-md-0 forgot-pass ob-sign-link-href">
            <p class="mt-1">Already have an account? <a href="login.php">Login here</a></p>
        </div>
        </div>
    </div>
  </div>
</section>

<!--=================================
Signin -->

<!--=================================
feature-info-->


<!--=================================
Back To Top-->
   <!-- <div id="back-to-top" class="back-to-top">
     <i class="fas fa-angle-up"></i>
   </div> -->
<!--=================================
Back To Top-->

<!--=================================
Javascript -->
@endsection
