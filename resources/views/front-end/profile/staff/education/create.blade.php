@extends('front-end.layouts.app')
@section('content')

    <section class="staff-education-main">
    <section class="space-ptb bg-light" style="padding:10px 0px">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="section-title text-center">
            <h2>Add New Education</h2>
           </div>
          </div>
        </div>
      </div>
    </section>
    <section class="space-ptb">
        <div class="container">
            <div class="tab-content staff-confidential-form">
                <div class="tab-pane active" id="candidate" role="tabpanel">
                    <form class="mt-4" id="form">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="text" class="inputText" name="instituteName">
                                    <span class="floating-label">Institution Name</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="text" class="inputText" name="degreeObtained">
                                    <span class="floating-label">Degree Obtained</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="text" class="inputText" name="speciality">
                                    <span class="floating-label">Speciality</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="date" class="inputText" name="startDate">
                                    <span class="floating-label">Degree Start Date</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="text" class="inputText" name="endDate">
                                    <span class="floating-label">Degree End Date</span>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <select class="inputText" name="country">
                                        <option value="">Institution Country</option>
                                        <option value="One">One</option>
                                        <option value="Two">Two</option>
                                        <option value="Three">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <!--<span class="floating-label">Institution City</span>-->
                                    <select class="inputText" name="city">
                                        <option value="">Institution City</option>
                                        <option value="One">One</option>
                                        <option value="Two">Two</option>
                                        <option value="Three">Three</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 ob-btn-login">
                                <button class="btn btn-primary " id="save">Save</button>
                            </div>
@csrf
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</section>

@endsection


@section('js')
    <script>
        $(document).ready(function (){
            $('#form').validate({
                rules: {
                    instituteName: {
                        required: true,
                    },
                    degreeObtained: {
                        required: true,
                    },
                    speciality: {
                        required: true,
                    },
                    startDate: {
                        required: true,
                    },
                    endDate: {
                        required: true,
                    },
                    country: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },

                },
                messages: {
                    instituteName:'Institute Name  is required',
                    degreeObtained:'Degree Obtained is required',
                    speciality:'Speciality is required',
                    startDate:'Start Date is required',
                    endDate:'End Date is required',
                    country:'Country is required',
                    city:'City is required',
                },
            });

            $('#form').on('submit', function (e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#form').valid() ) {
                    return false;
                }
                let id = "{{auth()->id()}}"
                let route = "{{route('education.update',['education'=>':education'])}}";
                route = route.replace(':education', id);
                console.log(route)
                $.ajax({
                    type: 'PUT',
                    url: route,
                    data: new FormData(this),
                    contentType: false,
                    data_type: 'json',
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        loader();
                    },
                    success: function (response) {

                        swal.close();
                        console.log(response)
                        alertMsg(response.message, response['status']);
                        // }


                    },
                    error: function (xhr, error, status) {
                        // console.log(xhr.responseJSON.errors.name[0])
                        swal.close();
                        var response = xhr.responseJSON;
                        // alertMsg(response.message, 'error');
                        alertMsg(response.message, 'error');
                    }
                });
            });
        })
    </script>
@endsection
