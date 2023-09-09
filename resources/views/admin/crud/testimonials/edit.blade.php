@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <form action="{{ route('testimonials.update', $testimonial) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card card-custom mb-2">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label">@lang('general.add_new')</h3>
                    </div>
                </div>
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line">
                        @foreach (config('translatable.locales') as $key => $locale)
                            <li class="nav-item">
                                <a class="nav-link  @if ($key == 0) active @endif" data-toggle="tab"
                                    href="{{ '#' . $locale }}">@lang('general.' . $locale)</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
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
                        @foreach (config('translatable.locales') as $key => $locale)
                            <div class="tab-pane fade show @if ($key == 0) active @endif"
                                id="{{ $locale }}" role="tabpanel">
                                <div class="form-group">
                                    <label>@lang('general.title') - @lang('general.' . $locale)<span class="text-danger"> * </span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                        </div>
                                        <input type="text" name="{{ $locale . '[title]' }}"
                                            placeholder="@lang('general.title')"
                                            class="form-control  pl-5 min-h-40px @error($locale . '.title') is-invalid @enderror"
                                            value="{{ old($locale . '.title', $testimonial->translate($locale)->title) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>@lang('general.subtitle') - @lang('general.' . $locale)<span class="text-danger"> * </span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                        </div>
                                        <input type="text" name="{{ $locale . '[subtitle]' }}"
                                            placeholder="@lang('general.subtitle')"
                                            class="form-control  pl-5 min-h-40px @error($locale . '.subtitle') is-invalid @enderror"
                                            value="{{ old($locale . '.subtitle', $testimonial->translate($locale)->subtitle) }}">
                                    </div>
                                </div>



                                <div class="col-form-group">
                                    <label>@lang('general.description')(@lang('general.' . $locale))<span class="text-danger">*</span></label>
                                    <textarea rows="100" class="summernote @error($locale . '.description') is-invalid @enderror" 
                                        name="{{ $locale . '[description]' }}">
                                    {!! old($locale . '.description', $testimonial->translate($locale)->description) !!} 
                                </textarea>
                                </div>
                                {{-- <div class="form-group">
                                    <label>@lang('testimonials.description') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                                    <textarea name="{{ $locale . '[description]' }}" @error($locale . '.description') is-invalid @enderror class="form-control kt-ckeditor-5">{{ old($locale . '.description') }}</textarea>
                                </div> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card card-custom">
                <div class="card-body mb-5">
                    <div class="row" style="height: 200px">

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="col-form-label d-block">@lang('general.image')</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                id="exampleInputFile1">
                                            <label class="custom-file-label"
                                                for="exampleInputFile1">@lang('general.choose_file')</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">@lang('general.upload_file')</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="form-group py-5">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <img src="{{ $testimonial->file->url }}" class="w-50">
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer mt-5">
                    <button type="submit" class="btn btn-success">@lang('general.save')</button>
                    <a href="{{ route('testimonials.index') }}" class="btn btn-danger font-weight-bold">@lang('general.cancel')</a>
                </div>
            </div>
        </form>
    </div>
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