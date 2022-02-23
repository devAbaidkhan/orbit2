@extends('front-end.layouts.app')
@section('content')
    <!--=================================
inner banner -->
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
                                <h3>{{auth()->user()->name}}</h3>
                                <p style="padding: 10px;">Visit <a href="{{url('company/dashboard')}}">Dashboard</a> to complete your Profile.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <hr/>
                </div>
            </div>
        </div>
    </div>
    <!--=================================
    inner banner -->
    <section class="space-ptb hmz-staff-dashboard">
        <div class="container">
            <div class="row align-items-center hmz-staff-dashboard-main">
                <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
                    <div class="ans-category-item pt-3">
                        <a href="staff-details.php" class="category-item p-0">
                            <div class="category-icon mb-3">
                                <img src="{{asset("images/staff/dashboard/7--Basic-Profile.png")}}" class="img-responsive">
                            </div>
                            <h6 class="ans-category-box-heading">Basic Profile</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
                    <div class="ans-category-item pt-3">
                        <a href="#" class="category-item p-0">
                            <div class="category-icon mb-3">
                                <img src="{{asset("images/staff/dashboard/8--Confidential-Info.png")}}" class="img-responsive">
                            </div>
                            <h6 class="ans-category-box-heading">Confidential Info</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
                    <div class="ans-category-item pt-3">
                        <a href="#" class="category-item p-0">
                            <div class="category-icon mb-3">
                                <img src="{{asset("images/staff/dashboard/1--General-Details.png")}}" class="img-responsive">
                            </div>
                            <h6 class="ans-category-box-heading">General Details</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
                    <div class="ans-category-item pt-3">
                        <a href="#" class="category-item p-0">
                            <div class="category-icon mb-3">
                                <img src="{{asset("images/staff/dashboard/2--Qualifications.png")}}" class="img-responsive">
                            </div>
                            <h6 class="ans-category-box-heading">Qualification</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
                    <div class="ans-category-item pt-3">
                        <a href="#" class="category-item p-0">
                            <div class="category-icon mb-3">
                                <img src="{{asset("images/staff/dashboard/3--Employment-History.png")}}" class="img-responsive">
                            </div>
                            <h6 class="ans-category-box-heading">Employment History</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
                    <div class="ans-category-item pt-3">
                        <a href="#" class="category-item p-0">
                            <div class="category-icon mb-3">
                                <img src="{{asset("images/staff/dashboard/4--Personal-References.png")}}" class="img-responsive">
                            </div>
                            <h6 class="ans-category-box-heading">Personal References</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
                    <div class="ans-category-item pt-3">
                        <a href="#" class="category-item p-0">
                            <div class="category-icon mb-3">
                                <img src="{{asset("images/staff/dashboard/5--Health-Info.png")}}" class="img-responsive">
                            </div>
                            <h6 class="ans-category-box-heading">Health Info</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
                    <div class="ans-category-item pt-3">
                        <a href="#" class="category-item p-0">
                            <div class="category-icon mb-3">
                                <img src="{{asset("images/staff/dashboard/6--Staff-Appearance.png")}}" class="img-responsive">
                            </div>
                            <h6 class="ans-category-box-heading">Staff Appearance</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
                    <div class="ans-category-item pt-3">
                        <a href="#" class="category-item p-0">
                            <div class="category-icon mb-3">
                                <img src="{{asset("images/staff/dashboard/9--Contact-Persons.png")}}" class="img-responsive">
                            </div>
                            <h6 class="ans-category-box-heading">Contact Persons</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
                    <div class="ans-category-item pt-3">
                        <a href="#" class="category-item p-0">
                            <div class="category-icon mb-3">
                                <img src="{{asset("images/staff/dashboard/10--Documents.png")}}" class="img-responsive">
                            </div>
                            <h6 class="ans-category-box-heading"><a href="{{route('document.index')}}">Documents</a> </h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
                    <div class="ans-category-item pt-3">
                        <a href="#" class="category-item p-0">
                            <div class="category-icon mb-3">
                                <img src="{{asset("images/staff/dashboard/11--Update-Password.png")}}" class="img-responsive">
                            </div>
                            <h6 class="ans-category-box-heading">Update Password</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
                    <div class="ans-category-item pt-3">
                        <a href="#" class="category-item p-0">
                            <div class="category-icon mb-3">
                                <img src="{{asset("images/staff/dashboard/12-Sign-Out.png")}}" class="img-responsive">
                            </div>
                            <h6 class="ans-category-box-heading">Sign Out</h6>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--=================================
    My Profile -->
@endsection
@section('js')
    <script src="{{asset('plugins/ijaboCropTool/ijaboCropTool.min.js')}}"></script>
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
