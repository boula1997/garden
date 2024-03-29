@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">

        <div class="card card-custom card-stretch gutter-b">
            <div class="card-header card-header-tabs-line">
                <div class="card-title">
                    <h3 class="card-label">@lang('general.show')</h3>
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
            <div class="card-body p-10">
                <div class="tab-content">
                    @foreach (config('translatable.locales') as $key => $locale)
                        <div class="tab-pane fade show @if ($key == 0) active @endif"
                            id="{{ $locale }}" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-7 bg-light p-3 rounded h-100">
                                        <div class="card-title">
                                            <h5 class="font-weight-bolder text-dark">@lang('general.title'):</h5>
                                            <p class="m-0">{{ $counter->translate($locale)->title }}</p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-7 bg-light p-3 rounded h-100">
                        <div class="card-title">
                            <h5 class="font-weight-bolder text-dark">@lang('general.count'):</h5>
                            <p class="m-0">{{ $counter->count }}</p>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </div>
@endsection
