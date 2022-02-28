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
                                <h3>{{auth()->user()->name}}</h3>
                                <p style="padding: 10px;">Visit <a href="{{url('company/dashboard')}}">Dashboard</a> to complete your Profile.</p>
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
                            <h3 class="mb-0 text-white">{{count($jobs)}}</h3>
                        </div>
                    </div>
                </div>
{{--                @dd($jobs[0]->type,$jobs[0]->site)--}}
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
                    @foreach($jobs as $job )
                    <div class="employers-list">
                        <div class="employers-list-details">
                            <div class="employers-list-info">
                                <div class="employers-list-title">
                                    <h5 class="mb-0 ob-company-heading">
                                        <a href="">{{$job->job_title}}</a>
                                        <a href="staff-job-listing.php">
                                            <span class="job-listing-link"></span>
                                        </a>
                                    </h5>
                                </div>
                                <div class="employers-list-option">
                                    <ul class="list-unstyled">
                                        <li>{{$job->site_name}}</li>
                                        <li><i class="fas fa-map-marker-alt pe-1"></i>
                                            {{$job->job_description}}
                                        </li>
                                        <li>

                                        </li>
                                    </ul>
                                </div>
                                <a href="{{url('company/job/'.$job->id.'/applications')}}">
                                    <div class="badge badge-warning">{{($job->applications ? 'Applications: '.$job->applications->count() : 'No Applications' )}}</div>
                                </a>

                            </div>
                        </div>
                        <div class="employers-list-position">
                            <a class="btn btn-primary btn-job-font" href="#">{{$job->quantity}} position</a>
                            <p>Salary: {{$job->salary}}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>



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
