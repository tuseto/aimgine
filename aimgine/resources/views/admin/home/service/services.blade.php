@extends('admin.master')
@section('content')

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            @include('admin.includes.header')
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                @include('admin.includes.sidebar')
                <div class="page-content-wrapper">
                    <div class="page-content" style="min-height: 1432px;">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase"> Services</span>
                                </div>
                            </div>
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <form method="GET" action="{{URL::to('admin/home/service/create/')}}" style="text-align:right;">
                                                <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            @foreach($services as $service)
                                <div class="row">
                                    <div class="col-md-12">
                                                        <!-- BEGIN Portlet PORTLET-->
                                <div class="portlet solid grey-cascade">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-gift"></i>Service - {{$service->position}} </div>
                                        <div class="actions">

                                            <div class="btn-group">
                                                <form method="GET" action="{{URL::to('admin/home/service/'.$service->id.'/edit')}}" style="display:inline-block;">
                                                    <button class="btn btn-primary" type="submit">Edit</button>
                                                </form>
                                                <form method="POST" action="{{URL::to('admin/home/service/'.$service->id)}}" style="display:inline-block;">
                                                    {!! method_field('DELETE') !!}
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                    {!! csrf_field() !!}
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="{{URL::to('content/img/services/'.$service->svg)}}" />

                                    </div>
                                    <div class="portlet-body">{{$service->text}}</div>
                                </div>
                                <!-- END GRID PORTLET-->
                            </div>

                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> 2017 &copy; Aimgine Admin
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>

@endsection
