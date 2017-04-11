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
                        <div class="portlet-body form">
                            <form role="form" method="POST" action="{{URL::to('admin/home/service/'.$service->id)}}" enctype="multipart/form-data" accept-charset="UTF-8">
                                {!! method_field('PUT') !!}
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Service position</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="position" value="{{ $service->position }}" id="exampleInputPassword1" placeholder="Position">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Service name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name" value="{{ $service->name }}" id="exampleInputPassword1" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Text</label>
                                        <textarea class="form-control" rows="10" name="text">{{ $service->text }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile1">Image</label>
                                        <img class="fitImageToContainer" src="{{URL::to('content/img/services/'.$service->svg)}}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile1">Image</label>
                                        <input type="file" id="exampleInputFile1" name="image">
                                    </div>

                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn blue">Submit</button>
                                    <button type="reset" class="btn default">Reset</button>
                                </div>
                                {!! csrf_field() !!}
                            </form>
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
