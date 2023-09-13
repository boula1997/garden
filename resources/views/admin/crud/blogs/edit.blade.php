@extends('admin.components.form')
@section('form_action', route('blogs.update', $blog->id))
@section('form_type', 'POST')
@section('fields_content')
    @method('put')
    <div class="content-wrapper">
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
                                    <input type="text" name="{{ $locale . '[title]' }}" placeholder="@lang('general.title')"
                                        class="form-control  pl-5 min-h-40px @error($locale . '.title') is-invalid @enderror"
                                        value="{{ old($locale . '.title', $blog->translate($locale)->title) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('general.subtitle') - @lang('general.' . $locale)<span class="text-danger"> *
                                    </span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                    </div>
                                    <input type="text" name="{{ $locale . '[subtitle]' }}"
                                        placeholder="@lang('general.subtitle')"
                                        class="form-control  pl-5 min-h-40px @error($locale . '.subtitle') is-invalid @enderror"
                                        value="{{ old($locale . '.subtitle', $blog->translate($locale)->subtitle) }}">
                                </div>
                            </div>



                            <div class="col-form-group">
                                <label>@lang('general.description')(@lang('general.' . $locale))<span class="text-danger">*</span></label>
                                <textarea rows="100" class="summernote @error($locale . '.description') is-invalid @enderror"
                                    name="{{ $locale . '[description]' }}">
                                    {!! old($locale . '.description', $blog->translate($locale)->description) !!} 
                                </textarea>
                            </div>
                            {{-- <div class="form-group">
                                    <label>@lang('blogs.description') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                                    <textarea name="{{ $locale . '[description]' }}" @error($locale . '.description') is-invalid @enderror class="form-control kt-ckeditor-5">{{ old($locale . '.description') }}</textarea>
                                </div> --}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card card-custom">
            <div class="card-body mb-5">
                <div class="row mt-5" style="height: 200px">

                    <div class="col-md-6">
                        @include('admin.components.image', [
                            'label' => __('words.image'),
                            'value' => old('image', $blog->image),
                            'name' => 'image',
                            'id' => 'kt_image_3',
                            'accept' => 'image/*',
                            'required' => true,
                        ])

                    </div>
                </div>
            </div>
            <div class="card-footer mt-5">
                <button type="submit" class="btn btn-success">@lang('general.save')</button>
                <a href="{{ route('blogs.index') }}" class="btn btn-danger font-weight-bold">@lang('general.cancel')</a>
            </div>
        </div>
    </div>


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
@endsection
