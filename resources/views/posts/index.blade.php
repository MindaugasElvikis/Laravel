@extends('adminlte::page')

@section('title', 'Posts lists')

@section('content_header')
    <h1>Posts lists</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Hover Data Table</h3>
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
                        @alert()
                            @slot('title')
                                test
                            @endslot
                            dwqdqwd
                        @endalert
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

                            @foreach($posts as $post)
                                <tr role="row" class="odd">
                                    <td>{{ $post->id }}</td>
                                    <td>{{ implode(', ', $post->categories()->pluck('name')->toArray()) }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td>{{ $post->comments->count() }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" role="status" aria-live="polite">
                            Showing 1 to 10 of 57 entries
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
