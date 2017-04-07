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
                                    <span class="caption-subject bold uppercase"> Team</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <form method="GET" action="{{URL::to('admin/whoarewe/testimonials/create/')}}" style="text-align:right;">
                                                <button id="sample_editable_1_new" class="btn sbold green"> Add New testimonial
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>

                                </div>
                                <div class="mt-element-card mt-element-overlay">
                                    <div class="row">
                                        @foreach($testimonials as $user)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                            <div class="mt-card-item">
                                                <div class="mt-card-avatar mt-overlay-1">
                                                    <img src="{{URL::to('content/img/testimonials/'.$user->image)}}">
                                                    <div class="mt-overlay">
                                                        <ul class="mt-info">

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="mt-card-content">
                                                    <h3 class="mt-card-name">{{$user->client_name}}</h3>
                                                    <h3 class="mt-card-name">{{$user->person_name}}</h3>

                                                    <p class="mt-card-desc font-grey-mint"></p>
                                                    <form method="GET" action="{{URL::to('admin/whoarewe/testimonials/'.$user->id.'/edit')}}" style="display:inline-block;">
                                                        <button class="btn btn-primary" type="submit">Edit</button>
                                                    </form>
                                                    <form method="POST" action="{{URL::to('admin/whoarewe/testimonials/'.$user->id)}}" style="display:inline-block;">
                                                        {!! method_field('DELETE') !!}
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                        {!! csrf_field() !!}
                                                    </form>
                                                    <div class="mt-card-social">
                                                        <ul>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach


                                            </div>
                                </div>
                            </div>
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
