@extends('admin.crud.Layouts.App')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  </h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{route('counters.index')}}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>الاسم</strong><br>
                <p  style="display: inline">{{$counter->title}}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>العدد</strong><br>
                <p  style="display: inline">{{$counter->count}}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>تاريخ الانشاء:</strong>
                <p style="display: inline">{{$counter->created_at}}</p>

            </div>
        </div>
    </div>
@endsection