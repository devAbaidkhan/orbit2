@extends('front-end.layouts.app')
@section('content')
    <section class="space-ptb">
        <div class="container">
            <div class="tab-content">
                <div class="tab-pane active" id="candidate" role="tabpanel">
                    <form  method="post" class="mt-4" id="add_document_form">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <label for="add_document_type"></label><select name="add_document_type" id="add_document_type" class="inputText">
                                        <option value=""  >Document Type</option>
                                        @foreach($document_names as $document_name)
                                        <option value="{{$document_name->id}}">{{$document_name->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="file" class="inputText"
                                           name="add_document_file_path"
                                           id="add_document_file_path">

                                    <span class="floating-label">File</span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 ob-btn-login">
                                <button class="btn btn-primary">Save</button>
                            </div>

                        </div>
                    </form>
                    <div class="ob-sign-margin-top mt-md-0 forgot-pass ob-sign-link-href">
                        <p class="mt-1"><i class="fa fa-arrow-left"></i><a onclick="history.back()"> Back</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    {{--Document Person script--}}
    <script>
        $(document).ready(function () {

            $('#add_document_form').validate({
                rules: {
                    add_document_type: {
                        required: true,
                    },
                    add_document_file_path: {
                        required: true,
                    },

                },
                messages: {
                    add_document_type: 'Name is required',
                    add_document_file_path: 'Phone Number is required',
                },
            });

            $('#add_document_form').on('submit', function (e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#add_document_form').valid()) {
                    return false;
                }

                var route = "{{route('document.store')}}";
                $.ajax({
                    type: 'POST',
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
                        //console.info(response);
                        //alert(response.message);
                        swal.close();
                        $('#add_document_form')[0].reset();
                        alertMsg(response.message, response.status);
                    },
                    error: function (xhr, error, status) {
                        swal.close();
                        var response = xhr.responseJSON;
                        alertMsg(response.message, 'error');
                    }
                });
            });



        });
    </script>
    {{--/Document Person Script--}}
@endsection
