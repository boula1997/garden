@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">

        <div class="card card-custom card-stretch gutter-b">
            <div class="card-header card-header-tabs-line">
                <div class="card-title">
                    <h3 class="card-label">@lang('general.show')</h3>
                </div>
            </div>
            <div class="card-body p-10">
                <div class="tab-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-7 bg-light p-3 rounded h-100">
                                        <div class="card-title">
                                            <h5 class="font-weight-bolder text-dark">@lang('general.name'):</h5>
                                            <p class="m-0">{{ $contact->name }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-7 bg-light p-3 rounded h-100">
                                        <div class="card-title">
                                            <h5 class="font-weight-bolder text-dark">@lang('general.email'):</h5>
                                            <p class="m-0">{{ $contact->email }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-7 bg-light p-3 rounded h-100">
                                        <div class="card-title">
                                            <h5 class="font-weight-bolder text-dark">@lang('general.message'):</h5>
                                            <p class="m-0">{{ $contact->message }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>
@endsection
