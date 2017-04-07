<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Metronic Admin Theme #1 | User Login 1</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{{URL::to('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('adminAssets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('adminAssets/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('adminAssets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('adminAssets/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{URL::to('adminAssets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('adminAssets/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{URL::to('adminAssets/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{URL::to('adminAssets/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{URL::to('adminAssets/css/login.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('adminAssets/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('adminAssets/css/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{URL::to('adminAssets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{URL::to('adminAssets/css/customP.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('adminAssets/css/summernote.css')}}" rel="stylesheet" type="text/css" />

        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="{{URL::to('favicon.ico')}}" />
    </head>
    <!-- END HEAD -->

        @if($errors)
        <div class="">
            @foreach($errors->all() as $err)
                <div class="backMessage">{{ $err }}</div>
            @endforeach
        </div>
        @endif

        @yield('content')

        <div class="copyright"> 2017 © Aimgine Admin. </div>
        <!--[if lt IE 9]>
        <script src="{{URL::to('adminAssets/plugins/respond.min.js')}}"></script>
        <script src="{{URL::to('adminAssets/plugins/excanvas.min.js')}}"></script>
        <script src="{{URL::to('adminAssets/plugins/ie8.fix.min.js')}}"></script>
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{URL::to('adminAssets/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('adminAssets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('adminAssets/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('adminAssets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('adminAssets/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('adminAssets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{URL::to('adminAssets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('adminAssets/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('adminAssets/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{URL::to('adminAssets/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{URL::to('adminAssets/scripts/login.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{URL::to('adminAssets/scripts/layout.min.js')}}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script src="{{URL::to('adminAssets/scripts/summernote.min.js')}}"></script>

        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });

                $('#summernote').summernote({
                    minHeight: 400,
                });

                $('#fileName').val(makeid());
                $('#newArticle').submit(function(e){
                    // e.preventDefault();
                    var textareaValue = $('#summernote').summernote('code');
                    var fileName = $('#fileName').val();
                    $.ajax({
                        url: '../../../admin/api/newArticle',
                        type: 'POST',
                        data:{
                            fileName: fileName,
                            textArea: textareaValue,
                            '_token': '{!! csrf_token() !!}',
                        },
                        success: function (data) {
                            console.log(data);
                        }
                    });
                });

                $('#editArticle').submit(function(e){
                    // e.preventDefault();
                    var textareaValue = $('#summernote').summernote('code');
                    var fileName = $('#oldFileName').val();
                    console.log(fileName);
                    $.ajax({
                        url: '../../../../admin/api/newArticle',
                        type: 'POST',
                        data:{
                            fileName: fileName,
                            textArea: textareaValue,
                            '_token': '{!! csrf_token() !!}',
                        },
                        success: function (data) {
                            console.log(data);
                        }
                    });
                });
                $('#editApproach').submit(function(e){
                    e.preventDefault();
                    // console.log("asd");
                    var textareaValue = $('#summernote').summernote('code');
                    var fileName = $('#filename').val();
                    //
                    console.log(fileName);
                    console.log(textareaValue);
                    //
                    $.ajax({
                        url: '../../admin/api/ourapproach',
                        type: 'POST',
                        data:{
                            fileName: fileName,
                            textArea: textareaValue,
                            '_token': '{!! csrf_token() !!}',
                        },
                        success: function (data) {
                            console.log(data);
                        }
                    });
                });

                function makeid(){
                    var text = "";
                    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                    for( var i=0; i < 10; i++ ){
                        text += possible.charAt(Math.floor(Math.random() * possible.length));
                    }
                    return text+".html";
                }
            })
            $(document).click(function(){
                $('.backMessage').css('visibility','hidden');
            })
        </script>

    </body>
</html>
