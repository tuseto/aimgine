@extends('admin.master')
@section('content')
<!DOCTYPE html>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            @include('admin.includes.header')
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                @include('admin.includes.sidebar')
                <div class="page-content-wrapper">
                    <div class="page-content" style="min-height: 1432px;">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase"> Elements </span>
                                        </div>

                                    </div>
                                    <div class="portlet-body">
                                        <form role="form" method="POST" action="{{URL::to('admin/contactus/elements/'.$element->id)}}" enctype="multipart/form-data" accept-charset="UTF-8">
                                            <div class="form-body">
                                                {!! method_field('PUT') !!}

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Name</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="name" value="{{ $element->element_name }}" id="exampleInputPassword1" placeholder="Element name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Element</label>
                                                    <textarea class="form-control" rows="10" name="element">{{ $element->element }}</textarea>
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn blue">Submit</button>
                                                <button type="reset" class="btn default">Reset</button>
                                            </div>
                                            {!! csrf_field() !!}
                                        </form>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
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
