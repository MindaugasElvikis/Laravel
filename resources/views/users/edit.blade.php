@extends('adminlte::page')

@section('title', 'Posts lists')

@section('content_header')
    <h1>Edit - {{ $user->name }}</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit - {{ $user->name }}</h3>
        </div>
        <div class="box-body">
            <img src="{{ asset(config('filesystems.disks.public.url') . '/' . $user->image->path) }}">
            <form role="form" action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input name="testas" type="file">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
@stop
