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
                                            <span class="caption-subject bold uppercase"> Projects</span>
                                        </div>

                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="btn-group">
                                                        <form method="GET" action="{{URL::to('admin/work/projects/create/')}}" style="text-align:right;">
                                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                                <i class="fa fa-plx`us"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th> Name </th>
                                                    <th> Desc </th>
                                                    <th> Added </th>
                                                    <th> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($projects as $project)
                                                <tr class="odd gradeX" style="max-height:100px;">
                                                    <td> {{$project->name}} </td>
                                                    <td>
                                                        {{$project->description}}
                                                    </td>
                                                    
                                                    <td class="center"> {{$project->created_at}} </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-left actionBtns" role="menu">
                                                                <li>
                                                                    <form method="GET" action="{{URL::to('admin/work/projects/'.$project->id.'/edit')}}" style="display:inline-block;">
                                                                        <button class="btn btn-primary" type="submit">Edit</button>
                                                                    </form>
                                                                </li>
                                                                <li>
                                                                    <form method="POST" action="{{URL::to('admin/work/projects/'.$project->id)}}" style="display:inline-block;">
                                                                        {!! method_field('DELETE') !!}
                                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                                        {!! csrf_field() !!}
                                                                    </form>

                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

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
