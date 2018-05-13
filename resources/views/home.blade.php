@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>
    {{--<passport-clients></passport-clients>--}}
    {{--<passport-authorized-clients></passport-authorized-clients>--}}
    {{--<passport-personal-access-tokens></passport-personal-access-tokens>--}}
    <messages></messages>
@stop
