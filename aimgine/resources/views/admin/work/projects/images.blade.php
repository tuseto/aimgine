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
                                            <span class="caption-subject bold uppercase">Images of {{$project->name}}</span>
                                        </div>
                                    </div>
                                    <form role="form" method="POST" action="{{URL::to('admin/work/projects/'.$project->id.'/images')}}" enctype="multipart/form-data" accept-charset="UTF-8">
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label for="exampleInputFile1">Image</label>
                                                <input type="file" id="exampleInputFile1" name="image">
                                            </div>

                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn blue">Add</button>
                                        </div>
                                        {!! csrf_field() !!}
                                    </form>
                                    <div class="portlet-body form">
                                        @foreach($images as $image)
                                        <div style="display:inline-block;">
                                            <div>
                                                <img style="max-width:200px;" src="{{URL::to('content/img/projects/'.$image->image)}}" />

                                            </div>
                                            <form method="POST" action="{{URL::to('admin/work/projects/'.$project->id.'/images/'.$image->id)}}" style="display:inline-block;">
                                                {!! method_field('DELETE') !!}
                                                <button type="submit" class="btn btn-default btn-sm">
                                                  <span class="glyphicon glyphicon-trash"></span> Trash
                                                </button>
                                                {!! csrf_field() !!}
                                            </form>

                                        </div>
                                        @endforeach
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
