@extends('front-end.layouts.app')
@section('content')
    <style>
        .ans-flex-between {
            display: flex;
            justify-content: space-between;
        }

        .ans-course-id {
            font-size: 15px;
            margin-bottom: 5px;
        }

        .ans-course-duration {
            font-size: 15px;
            margin-bottom: 5px;
        }

        .ans-institution-name {
            font-size: 15px;
            margin-bottom: 0px;
            text-align: left;
        }

        .ans-flex-justify-center {
            display: flex;
            justify-content: center;
            border-top: 1px solid #eeeeee;
            margin-top: 10px;
            padding: 10px 0;
        }

        .ans-flex-justify-center a {
            font-size: 15px;
            display: inline-block;
            position: relative;
            height: 40px;
            width: 40px;
            line-height: 40px;
            border: 1px solid #eeeeee;
            border-radius: 100%;
            text-align: center;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            font-size: 16px;
            color: #ffffffbd;
            margin: 0px 20px;
            background: #8B4D9F;
        }

        .ans-add-new-btn {
            width: 100%;
            background: #ffffff;
            color: #ff8a00;
            border: 2px solid #8B4D9F;
            color: #777;
        }

        .space-ptb {
            background: #f7f7f7;
        }


        .ans-justifyleft-pad img {
            height: 50px;
            padding-left: 0px;
            padding-right: 10px;
            display: inline;
        }

        .ans-justifyleft-pad h4 {
            display: inline;
            color: #777;
            font-size: 18px;
        }
    </style>
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--=================================
                    right-sidebar -->
                    <div class="row mb-4">
                        <div class="col-12 hmz-site-heading">
                            <h6 class="mb-0 mt-5">Qualification</h6>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6 col-lg-4">
                            <div class="job-list job-grid pt-2 pb-2">
                                <div class="job-list-details pb-0 mb-0" style="text-align: left">
                                    <div class="job-list-info">
                                        <div class="job-list-title">
                                            <div class="ans-justifyleft-pad">
                                                <a href="{{url('staff/education/show')}}" class="category-item p-0">
                                                    <img
                                                        src="https://acubepk.com/orbit-phase2/images/staff/dashboard/7--Basic-Profile.png">
                                                    <h4>Educational History</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="job-list job-grid pt-2 pb-2">
                                <div class="job-list-details pb-0 mb-0" style="text-align: left">
                                    <div class="job-list-info">
                                        <div class="job-list-title">
                                            <div class="ans-justifyleft-pad">
                                                <a href="{{url('staff/certification/show')}}" class="category-item p-0">
                                                <img
                                                    src="https://acubepk.com/orbit-phase2/images/staff/dashboard/7--Basic-Profile.png">
                                                <h4>Certifications</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="job-list job-grid pt-2 pb-2">
                                <div class="job-list-details pb-0 mb-0" style="text-align: left">
                                    <div class="job-list-info">
                                        <div class="job-list-title">
                                            <div class="ans-justifyleft-pad">
                                                <a href="{{url('staff/official-training/show')}}" class="category-item p-0">
                                                <img
                                                    src="https://acubepk.com/orbit-phase2/images/staff/dashboard/7--Basic-Profile.png">
                                                <h4>Official Trainings</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
