@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains portfolio content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content pt-2">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-light">
                            <div class="card-header">
                                <h3 class="card-title">Create Portfolio</h3>
                                <ol class="breadcrumb float-sm-right bg-light p-0 m-0">
                                    <li class="breadcrumb-item"><a href="{{route('portfolios.index')}}">Portfolios</a></li>
                                    <li class="breadcrumb-item active">@lang('general.create')</li>
                                </ol>
                            </div>
                            <!-- /.card-header -->
                            {{-- validation messages start --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>@lang('general.errors')</strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {{-- validation messages end --}}

                            <!-- form start -->
                            <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" name="title" value="{{ old('title') }}"
                                            class="form-control" id="exampleInputName" placeholder="Enter Name">
                                    </div>


                                        <div class="form-group">
                                        <label for="exampleInputDescription">Description</label>
                                        <textarea  name="description">
                                            {!! old('description') !!}
                                        </textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputFile1">Images</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="images[]" class="custom-file-input"
                                                    id="exampleInputFile1" multiple>
                                                <label class="custom-file-label" for="exampleInputFile1">@lang('general.choose_file')</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">@lang('general.upload_file')</span>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div> --}}
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-outline-primary px-5">@lang('general.save')</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->


                    </div>
                    <!--/.col (left) -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('scripts')
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
@endpush
