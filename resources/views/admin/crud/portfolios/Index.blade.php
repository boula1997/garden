@extends('admin.crud.Layouts.App')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-center">
                <h2 style="text-align: center">لوحة التحكم</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{route('dashboard')}}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
            <div class="pull-right">
                <a class="bt    n btn-success" href="{{route('portfolios.create')}}" title="Create a portfolio"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p style="text-align: end">{{$message}} </p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg" style="text-align: center">
        <tr>
            <th>رقم</th>
            <th>الاسم</th>
            <th>تاريخ النشاء</th>
            <th>التحكم</th>
        </tr>
        @foreach ($portfolios as $portfolio)
            <tr>
                <td>#{{$loop->iteration}}</td>
                <td>{{$portfolio->title}}</td>
                <td>{{$portfolio->created_at}}</td>
                <td style="width: 25%">
                    <form action="{{route('portfolios.destroy',$portfolio)}}" method="POST">

                        <a href="{{route('portfolios.show',$portfolio)}}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{route('portfolios.edit',$portfolio)}}" title="edit">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>
                        <br>
                        <br>
                        

                        @csrf   
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{-- {{-- {!! $portfolios->links() !!} --}}
 

@endsection