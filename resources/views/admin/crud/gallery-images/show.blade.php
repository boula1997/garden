@extends('admin.crud.Layouts.App')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('tests.index')}}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>الاسم</strong><br>
                <p  style="display: inline">{{$image->title}}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>الوصف</strong><br>
                <p style="display: inline">{!! $image->description !!}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="pull-right">الصورة  </strong>
              <img class="pull-left" src="{{asset($image->image)}}" alt="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>تاريخ الانشاء:</strong>
                <p style="display: inline">{{$image->created_at}}</p>

            </div>
        </div>
    </div>
@endsection