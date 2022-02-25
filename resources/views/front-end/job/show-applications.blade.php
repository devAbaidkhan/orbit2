@extends('front-end.layouts.app')
@section('content')

<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <div class="col-md-12">
            <div class="job-list border">
              <div class=" job-list-logo">
                <img class="img-fluid" src="images/svg/10.svg" alt="">
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <h5 class="mb-0">{{$job->job_title}}</h5>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-map-marker-alt pe-1"></i>{{@$job->site->address}}</li>
                      <li><i class="fas fa-phone fa-flip-horizontal fa-fw"></i><span class="ps-2">{{$job->company->phone_number}}</span></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="job-list-favourite-time">
                <a  class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>2W ago</span>
              </div>
            </div>
          </div>
        </div>
        <div class="border p-4 mt-4 mt-lg-5">
          <div class="row">
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-debit-card"></i>
                <div class="feature-info-content ps-3">
                  <label class="mb-1">Offered Salary</label>
                  <span class="mb-0 fw-bold d-block text-dark">£{{$job->salary}}</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-love"></i>
                <div class="feature-info-content ps-3">
                  <label class="mb-1">Gender</label>
                  <span class="mb-0 fw-bold d-block text-dark">{{ucwords($job->gender)}}</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-bar-chart"></i>
                <div class="feature-info-content ps-3">
                  <label class="mb-1">Career Level</label>
                  <span class="mb-0 fw-bold d-block text-dark">Executive</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-md-0 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-apartment"></i>
                <div class="feature-info-content ps-3">
                  <label class="mb-1">Industry</label>
                  <span class="mb-0 fw-bold d-block text-dark">Management</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-sm-0 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-medal"></i>
                <div class="feature-info-content ps-3">
                  <label class="mb-1">Experience</label>
                  <span class="mb-0 fw-bold d-block text-dark">{{ucwords($job->experience)}} Years</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-mortarboard"></i>
                <div class="feature-info-content ps-3">
                  <label class="mb-1">Qualification</label>
                  <span class="mb-0 fw-bold d-block text-dark">Bachelor Degree</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="my-4 my-lg-5">
          <h5 class="mb-3 mb-md-4">Job Description</h5>
            {{$job->job_description}}
{{--          <p>One of the main areas that I work on with my clients is shedding these non-supportive beliefs and replacing them with beliefs that will help them to accomplish their desires.</p>--}}

{{--          <p class="fst-italic">It is truly amazing the damage that we, as parents, can inflict on our children. So why do we do it? For the most part, we don’t do it intentionally or with malice. In the majority of cases, the cause is a well-meaning but unskilled or un-thinking parent, who says the wrong thing at the wrong time, and the message sticks – as simple as that!</p>--}}
        </div>
        <hr>
        <div class="my-4 my-lg-5">
          <h5 class="mb-3 mb-md-4">Job Applications:</h5>
        </div>
        <hr>
        <div class="col-lg-9">
            @foreach($job->applications as $application)

        <div class="employers-list">
          <div class="employers-list-logo">
            <img class="img-fluid" src="images/svg/01.svg" alt="">
          </div>
          <div class="employers-list-details">
            <div class="employers-list-info">
              <div class="employers-list-title">
                <h5 class="mb-0"><a href="employer-detail.html">{{@$application->staff->name}}</a></h5>
              </div>
              <div class="employers-list-option">
                <ul class="list-unstyled">
                  <li><i class="fas fa-filter pe-1"></i>Accountancy</li>
                  <li><i class="fas fa-map-marker-alt pe-1"></i>{{@$application->staff->address}}</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="employers-list-position">
            <a class="btn btn-sm btn-dark" href="#">Hire</a>
          </div>
        </div>
            @endforeach
      </div>
      </div>
      <!--=================================
      sidebar -->
      <div class="col-lg-4">
        <div class="sidebar mb-0">
          <div class="widget d-grid">
            <a class="btn btn-primary" href="#"><i class="far fa-paper-plane"></i>Apply for job</a>
          </div>
          <div class="widget">
            <div class="jobber-company-view">
              <ul class="list-unstyled">
                <li>
                  <div class="widget-box">
                    <div class="d-flex">
                      <i class="flaticon-clock fa-2x fa-fw text-primary"></i>
                      <span class="ps-3">35 Days</span>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="widget-box">
                    <div class="d-flex">
                      <i class="flaticon-personal-profile fa-2x fa-fw text-primary"></i>
                      <span class="ps-3">300-500 Application</span>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>
      <!--=================================
      sidebar -->
    </div>
  </div>
</section>

@endsection
