@extends('front-end.layouts.app')
@section('content')
    <section class="space-ptb">
        <div class="container">
            <div class="tab-content">
                <div class="tab-pane active" id="candidate" role="tabpanel">
                    <form class="mt-4" id="form">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <div class="user-input-wrp">
                                    <input type="number" class="inputText" id="add_document_title" name="add_document_title">
                                    <span class="floating-label">Title</span>
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
                                <button class="btn btn-primary " >Save</button>
                            </div>
                            @csrf
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
    <script>
        $(document).ready(function (){
            $('#form').validate({
                rules: {
                    add_document_title:{
                        required:true,
                    },
                    add_document_file_path:{
                        required:true,
                    },
                },
                messages: {
                    add_document_title:'Document Title is required',
                    add_document_file_path:'Document is required',
                },
            });

        })
    </script>
@endsection
