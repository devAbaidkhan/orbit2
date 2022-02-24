@extends('front-end.layouts.app')
@section('content')

  <style>
      .ans-flex-between{
          display: flex;
          justify-content: space-between;
      }
      .ans-course-id{
          font-size: 15px;
          margin-bottom: 5px;
      }
      .ans-course-duration{
          font-size: 15px;
          margin-bottom: 5px;
      }
      .ans-institution-name{
          font-size: 15px;
          margin-bottom: 0px;
          text-align: left;
      }
      .ans-flex-justify-center{
        display: flex;
        justify-content: center;
        border-top: 1px solid #eeeeee;
        margin-top: 10px;
        padding: 10px 0;
      }
      .ans-flex-justify-center a{
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
      .ans-add-new-btn{
          width: 100%;
              background: #ffffff;
    color: #ff8a00;
    border: 2px solid #8B4D9F;
    color: #777;
      }
      .space-ptb{
          background: #f7f7f7;
      }
  </style>

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
            <h6 class="mb-0 mt-5">Educational History</h6>
          </div>
        </div>
        <div class="job-filter mb-4 d-sm-flex align-items-center">
          <div class="job-shortby ms-sm-auto d-flex align-items-center">
            <div class="filter-btn ms-sm-3" style="width:100%"> <a class="btn btn-outline-primary ans-add-new-btn" href="{{route('education.create')}}" style="width:100%">Add New</a>
           </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="job-list job-grid pt-3">
              <div class="job-list-details pb-0 mb-0">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <h5 class="mb-0"><a href="job-detail.html">BS-Computer Science</a></h5>
                  </div>
                  <div class="ans-flex-between">
                    <div>
                        <p class="ans-course-id">ID: 003</p>
                    </div>
                    <div>
                        <p class="ans-course-duration">2014-2018</p>
                    </div>
                  </div>
                  <div>
                      <p class="ans-institution-name">Institution: Punjab University (New Campus)</p>
                      <p class="ans-institution-name">From: Lahore, Pakistan</p>
                      <p class="ans-institution-name">Speciality: Web Development & Networking</p>
                  </div>
                </div>
              </div>
              <div class="ans-flex-justify-center">
                  <a class="ans-education-dept-icons" href="#"><i class="far fa-edit"></i></a>
                  <a class="ans-education-dept-icons" href="#"><i class="far fa-trash-alt"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="job-list job-grid pt-3">
              <div class="job-list-details pb-0 mb-0">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <h5 class="mb-0"><a href="job-detail.html">F.sc-pre Engineering</a></h5>
                  </div>
                  <div class="ans-flex-between">
                    <div>
                        <p class="ans-course-id">ID: 002</p>
                    </div>
                    <div>
                        <p class="ans-course-duration">2012-2014</p>
                    </div>
                  </div>
                  <div>
                      <p class="ans-institution-name">Institution: Punjab Group of Colleges</p>
                      <p class="ans-institution-name">From: Lahore, Pakistan</p>
                      <p class="ans-institution-name">Speciality: Science Subjects</p>
                  </div>
                </div>
              </div>
              <div class="ans-flex-justify-center">
                  <a class="ans-education-dept-icons" href="#"><i class="far fa-edit"></i></a>
                  <a class="ans-education-dept-icons" href="#"><i class="far fa-trash-alt"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="job-list job-grid pt-3">
              <div class="job-list-details pb-0 mb-0">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <h5 class="mb-0"><a href="job-detail.html">Metric</a></h5>
                  </div>
                  <div class="ans-flex-between">
                    <div>
                        <p class="ans-course-id">ID: 001</p>
                    </div>
                    <div>
                        <p class="ans-course-duration">2010-2012</p>
                    </div>
                  </div>
                  <div>
                      <p class="ans-institution-name">Institution: District Public School</p>
                      <p class="ans-institution-name">From: Lahore, Pakistan</p>
                      <p class="ans-institution-name">Speciality: Science Subjects</p>
                  </div>
                </div>
              </div>
              <div class="ans-flex-justify-center">
                  <a class="ans-education-dept-icons" href="#"><i class="far fa-edit"></i></a>
                  <a class="ans-education-dept-icons" href="#"><i class="far fa-trash-alt"></i></a>
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
