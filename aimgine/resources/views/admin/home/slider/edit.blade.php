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
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN SAMPLE FORM PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-red-sunglo">
                                            <i class="icon-settings font-red-sunglo"></i>
                                            <span class="caption-subject bold uppercase">Edit slider</span>
                                        </div>

                                    </div>
                                    <div class="portlet-body form">
                                        <form role="form" method="POST" action="{{URL::to('admin/home/slider/'.$slider->id)}}" enctype="multipart/form-data" accept-charset="UTF-8">
                                            {!! method_field('PUT') !!}
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Slider position</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="position" id="exampleInputPassword1" placeholder="Position" value="{{$slider->position}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Text</label>
                                                    <textarea class="form-control" rows="3" name="text">{{$slider->text}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile1">Image</label>
                                                    <img src="{{URL::to('content/img/sliders/'.$slider->image)}}"
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile1">Image</label>
                                                    <input type="file" id="exampleInputFile1" name="image">
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn blue">Submit</button>
                                                <button type="button" class="btn default">Cancel</button>
                                            </div>
                                            {!! csrf_field() !!}
                                        </form>
                                    </div>
                                </div>
                                <!-- END SAMPLE FORM PORTLET-->
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
