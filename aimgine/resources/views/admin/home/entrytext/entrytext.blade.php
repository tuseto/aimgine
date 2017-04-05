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
                                            <span class="caption-subject bold uppercase"> Sliders</span>
                                        </div>

                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <div class="btn-group">
                                                        <form method="GET" action="{{URL::to('admin/home/entrytext/create/')}}" style="text-align:right;">
                                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    @foreach($entrytexts as $entrytext)
                                                    <div class="col-md-12 " style="margin-top:10px;">
                                                    <!-- BEGIN Portlet PORTLET-->
                                                    <div class="portlet solid purple">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="fa fa-gift"></i>Entry text </div>
                                                            <div class="actions">

                                                                <div class="btn-group">
                                                                    <form method="GET" action="{{URL::to('admin/home/entrytext/'.$entrytext->id.'/edit')}}" style="text-align:right;">
                                                                        <button id="sample_editable_1_new" class="btn sbold green"> Edit
                                                                            <i class="fa fa-pencil"></i>
                                                                        </button>
                                                                    </form>
                                                                    <hr />
                                                                    <form method="POST" action="{{URL::to('admin/home/entrytext/'.$entrytext->id)}}" style="text-align:right;">
                                                                        {!! method_field('DELETE') !!}
                                                                        <button id="sample_editable_1_new" class="btn sbold green"> Delete
                                                                            <i class="fa fa-bucket"></i>
                                                                        </button>
                                                                        {!! csrf_field() !!}
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body" style="width:100%;">
                                                            {{$entrytext->text}}
                                                        </div>
                                                    </div>
                                                    <!-- END Portlet PORTLET-->
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
