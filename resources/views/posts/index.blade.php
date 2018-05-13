@extends('adminlte::page')

@section('title', 'Posts lists')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
@endsection

@section('content_header')
    <h1>Posts lists</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title bg-redddd">Hover Data Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                               aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th>#</th>
                                <th>Categories</th>
                                <th>User</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Comments Count</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($posts as $poastas)
                                @include('posts.partials.post_line', ['post' => $poastas])
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" role="status" aria-live="polite">
                            Showing
                            {{ ($posts->currentPage() * $posts->perPage() - $posts->perPage()) +1 }}
                            to {{ ($posts->currentPage() * $posts->perPage() - $posts->perPage()) + $posts->count() }} of
                            {{ $posts->total() }}
                            entries
                        </div>
                    </div>
                    <div class="col-sm-7">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@stop
