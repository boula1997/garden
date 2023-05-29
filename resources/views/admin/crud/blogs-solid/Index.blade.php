@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blogs</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blogs</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('blogs.create') }}">
                            <button class="btn btn-primary">Create New</button>
                        </a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Bordered Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p style="text-align: end">{{ $message }} </p>
                                    </div>
                                @endif
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>image</th>
                                            <th>Name</th>
                                            <th>Controls</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"></td>
                                                <td>{{ $blog->title }}</td>
                                                <td>
                                                    <form action="{{ route('blogs.destroy', $blog) }}" method="POST">
                                                        <a href="{{ route('blogs.show', $blog) }}" title="show">
                                                            <i class="fas fa-eye text-success  fa-lg"></i>
                                                        </a>

                                                        <a href="{{ route('blogs.edit', $blog) }}" title="edit">
                                                            <i class="fas fa-edit  fa-lg"></i>
                                                        </a>

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" title="delete"
                                                            style="border: none; background-color:transparent;">
                                                            <i class="fas fa-trash fa-lg text-danger"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


@push('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush