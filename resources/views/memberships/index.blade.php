@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Messaging</h1>
@stop

@section('content')
    <div>
        <div class="row docs-premium-template">
            @foreach($memberships as $key => $membership)
                <div class="col-sm-12 col-md-6">
                    <div class="box box-solid">
                        <div class="box-body">
                            <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                                {{ $membership['name'] }}
                            </h4>
                            <div class="media">
                                <div class="media-left">
                                    <a href="https://themequarry.com/theme/ample-admin-the-ultimate-dashboard-template-ASFEDA95"
                                       class="ad-click-event">
                                        <img src="https://themequarry.com/storage/images/approved/ASFEDA95_v2.1_5a0eaa448e2d5.png"
                                             alt="Ample Admin" class="media-object"
                                             style="width: 150px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="clearfix">
                                        <p class="pull-right">
                                            <a href="{{route('memberships.request', $key)}}"
                                               class="btn btn-success btn-sm ad-click-event">
                                                Purchase
                                            </a>
                                        </p>

                                        <h4 style="margin-top: 0">{{ $membership['name'] }} ─
                                            ${{ $membership['price'] }}</h4>

                                        @foreach($membership['features'] as $feature)
                                            <p>{{ $feature }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
