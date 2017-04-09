@extends('admin.master')
@section('content')
dd($references)
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
                                            <span class="caption-subject bold uppercase">Edit references</span>
                                        </div>

                                    </div>
                                    <div class="portlet-body form">
                                        <form role="form" method="POST" action="{{URL::to('admin/home/references')}}" enctype="multipart/form-data" accept-charset="UTF-8">
                                            <div class="form-body">
                                            {!! method_field('PUT') !!}
                                            <div class="mt-element-card mt-element-overlay">
                                                <div class="row">
                                                    @foreach($testimonials as $user)
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                        <div class="mt-card-item">
                                                            <div class="mt-card-avatar mt-overlay-1 updatedReferences">
                                                                <img src="{{URL::to('content/img/testimonials/'.$user->image)}}">
                                                            </div>
                                                            <div class="mt-card-content">
                                                                <h3 class="mt-card-name">{{$user->client_name}}</h3>
                                                                <h3 class="mt-card-name">{{$user->person_name}}</h3>

                                                                <p class="mt-card-desc font-grey-mint"></p>

                                                                <label class="mt-checkbox" >
                                                                    @if($user->onHome === 1)
                                                                        <input type="checkbox" name="references[]" value="{{$user->id}}" checked> Added
                                                                        <span></span>
                                                                    @else
                                                                        <input type="checkbox" name="references[]" value="{{$user->id}}"> Added
                                                                        <span></span>
                                                                    @endif

                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    @endforeach
                                                    </div>
                                            </div>


                                            </div>
                                            @if($testimonials->isEmpty())
                                                <h3>There are no testimonials</h3>
                                            @else
                                                <div class="form-actions">
                                                    <button type="submit" class="btn blue">Submit</button>
                                                </div>
                                                {!! csrf_field() !!}
                                            @endif

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
