@extends('front-end.layouts.app')
@section('content')

<section class="space-ptb">
  <div class="container">
    <div class="row align-items-center">
      <h2 class="title text-center">What are you looking for?</h2>


        <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
            <div class="ans-category-item pt-3">
                <a href="{{url('staff/basic/create')}}" class="category-item p-0">
                    <div class="category-icon mb-3">
                    <i class="flaticon-worker"></i>
                    </div>
                    <h6 class="ans-category-box-heading">Basic</h6>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
            <div class="ans-category-item pt-3">
                <a href="{{url('staff/bank/create')}}" class="category-item p-0">
                    <div class="category-icon mb-3 text-center">
                    <i class="flaticon-suitcase"></i>
                    </div>
                    <h6 class="ans-category-box-heading">Bank Details</h6>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
            <div class="ans-category-item pt-3">
                <a href="{{url('staff/passport/create')}}" class="category-item p-0">
                    <div class="category-icon mb-3">
                    <i class="flaticon-debit-card"></i>
                    </div>
                    <h6 class="ans-category-box-heading">Passport Details</h6>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 text-center mb-3">
            <div class="ans-category-item pt-3">
{{--                <a href="{{url('staff/create/emergency')}}" class="category-item p-0">--}}
{{--                    <div class="category-icon mb-3 text-center">--}}
{{--                    <i class="flaticon-conversation"></i>--}}
{{--                    </div>--}}
{{--                    <h6 class="ans-category-box-heading">Emergency Details</h6>--}}
{{--                </a>--}}

                <a href="{{route('contact-person.create')}}" class="category-item p-0">
                    <div class="category-icon mb-3 text-center">
                        <i class="flaticon-conversation"></i>
                    </div>
                    <h6 class="ans-category-box-heading">Contact Persons</h6>
                </a>
            </div>
        </div>

    </div>

  </div>
</section>
@endsection
