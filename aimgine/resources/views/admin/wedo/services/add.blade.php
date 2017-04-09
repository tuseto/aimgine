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
                                            <span class="caption-subject bold uppercase">Add service </span>
                                        </div>

                                    </div>
                                    <div class="portlet-body form">
                                        <form id="newArticle" role="form" method="POST" action="{{URL::to('admin/wedo/services')}}" enctype="multipart/form-data" accept-charset="UTF-8">
                                            <div class="form-body">

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Service position</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="position" value="{{ old('position') }}" id="exampleInputPassword1" placeholder="Position">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                                </div>
                                                <div class="form-group">
                                                        <label>Category</label>
                                                        <select class="form-control" name="category">
                                                            @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>

                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="articleText">Текст</label>
                                                        <input id="fileName" type="hidden" name="text" value="" />
                                                        <div id="summernote" name="articleContent">

                                                        </div>
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
