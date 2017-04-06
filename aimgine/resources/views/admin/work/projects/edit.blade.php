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
                                            <span class="caption-subject bold uppercase">Edit project</span>
                                        </div>

                                    </div>
                                    <form method="GET" action="{{URL::to('admin/work/projects/'.$project->id.'/images')}}" style="text-align:right;">
                                        <button id="sample_editable_1_new" class="btn sbold green"> Add Images
                                            <i class="fa fa-plx`us"></i>
                                        </button>
                                    </form>
                                    <div class="portlet-body form">
                                        <form role="form" method="POST" action="{{URL::to('admin/work/projects/'.$project->id)}}" enctype="multipart/form-data" accept-charset="UTF-8">
                                            {!! method_field('PUT') !!}
                                            <div class="form-body">

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Name</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="name" value="{{ $project->name }}" id="exampleInputPassword1" placeholder="Position">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" rows="5" name="description">{{ $project->description }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Link</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="link" value="{{ $project->link }}" id="exampleInputPassword1" placeholder="Position">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Linked projects</label>
                                                    <div class="col-md-9">
                                                        <div class="mt-checkbox-inline">
                                                            @foreach($projects as $proj)

                                                            <?php $checked = "" ?>
                                                                @foreach($linkedProjects as $lproj)

                                                                    @if($proj->id == $lproj->linked_project_id)
                                                                    <?php $checked = "checked";?>
                                                                    @endif
                                                                @endforeach
                                                            <label class="mt-checkbox">
                                                                <input type="checkbox" id="inlineCheckbox21" name="linkedProjects[]" value="{{$proj->id}}" {{$checked or ''}} > {{$proj->name}}<span></span>
                                                            </label>

                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile1">Image</label>
                                                    <input type="file" id="exampleInputFile1" name="image">
                                                </div>

                                                @foreach($images as $image)
                                                <?php $checked = "";?>

                                                    @if($image->project_id == $project->id)
                                                        @if($image->id == $project->thumbnail)
                                                        <?php $checked = "checked";?>
                                                        @endif
                                                        <label class="mt-checkbox">
                                                            <input type="radio" id="inlineCheckbox21" name="imgthumb" value="{{$image->id}}" {{$checked or ''}} > <span></span>
                                                        </label>
                                                        <div style="width:200px;">
                                                            <img style="max-width:100%;" src="{{URL::to('content/img/projects/'.$image->image)}}" />
                                                        </div>

                                                    @endif
                                                @endforeach


                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn blue">Submit</button>
                                                <button type="button" class="btn default">Cancel</button>
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
