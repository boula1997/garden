@extends('front.layouts.master')
@section('content')
    <!-- full Title -->
    <div class="full-title">
        <div class="container">
            <!-- Page Heading/Breadcrumbs -->
            <h1 class="mt-4 mb-3">{{ $service->title }}
                <small>{{ $service->subtitle  }}</small>
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="breadcrumb-main">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">الرئسية</a>
                </li>
                <li class="breadcrumb-item active">{{ $service->title }}</li>
            </ol>
        </div>

    </div>
    <div class="about-main">
        <div class="row">
           <div class="col-lg-6">
              <h2>{{ $service->title }}</h2>
              {!!  $service->description  !!}
              <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p> -->
           </div>
           <div class="col-lg-6">
              <img class="img-fluid rounded" src="{{ asset($service->image)}}" alt="" />
           </div>
        </div>
        <!-- /.row -->
    </div>
@endsection
