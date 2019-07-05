<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Nitty-Gritty - Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- <script src="../../cdn-cgi/apps/head/QJpHOqznaMvNOv9CGoAdo_yvYKU.js"></script><link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" /> -->
<link href="{{ asset('public/plugins/jquery-metrojs/MetroJs.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/shape-hover/css/demo.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/shape-hover/css/component.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/owl-carousel/owl.carousel.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/owl-carousel/owl.theme.css') }}" />
<link href="{{ asset('public/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ asset('public/plugins/jquery-slider/css/jquery.sidr.light.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="{{ asset('public/plugins/jquery-ricksaw-chart/css/rickshaw.css') }}" type="text/css" media="screen">
<link rel="stylesheet" href="{{ asset('public/plugins/Mapplic/mapplic/mapplic.css') }}" type="text/css" media="screen">


<link href="{{ asset('public/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ asset('public/plugins/bootstrapv3/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/bootstrapv3/css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="{{ asset('public/plugins/animate.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('public/css/webarch.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('public/developer/css/styles.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/6fd4525080.js"></script><link rel="stylesheet" href="{{ asset('public/plugins/jquery-morris-chart/css/morris.css') }}" type="text/css" media="screen">

</head>

<body class="">

    <!-- start header---->
        @include('admin.includes.header')
    <!-- end header---->
    <div class="page-container row-fluid">
       <!--- start sidebar ---->
       @include('admin.includes.sidebar')
        <!--- start sidebar ---->

        <div class="page-content">

<div id="portlet-config" class="modal hide">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
    </div>
    <div class="modal-body"> Widget settings form goes here </div>
</div>

<div class="clearfix"></div>
<!-- main content start---->
@yield('content')
<!--- main content end----->
</div>


</div>

        

        




<script src="{{ asset('public/plugins/pace/pace.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('public/plugins/jquery/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/bootstrapv3/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/jquery-block-ui/jqueryblockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/jquery-numberAnimate/jquery.animateNumbers.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<!-- <script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script> -->


<script src="{{ asset('public/js/webarch.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/chat.js') }}" type="text/javascript"></script>



<script src="{{ asset('public/plugins/jquery-ricksaw-chart/js/d3.v2.js') }}"></script>
<script src="{{ asset('public/plugins/jquery-ricksaw-chart/js/rickshaw.min.js') }}"></script>
<script src="{{ asset('public/plugins/jquery-morris-chart/js/morris.min.js') }}"></script>
<script src="{{ asset('public/plugins/jquery-easy-pie-chart/js/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('public/plugins/jquery-sparkline/jquery-sparkline.js') }}"></script>
<script src="{{ asset('public/plugins/skycons/skycons.js') }}"></script>
<!-- <script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script> -->
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script src="{{ asset('public/plugins/jquery-gmap/gmaps.js') }}" type="text/javascript"></script>

<!-- <script src="assets/plugins/Mapplic/js/jquery.easing.js" type="text/javascript"></script>
<script src="assets/plugins/Mapplic/js/jquery.mousewheel.js" type="text/javascript"></script>
<script src="assets/plugins/Mapplic/js/hammer.js" type="text/javascript"></script> -->
<script src="{{ asset('public/plugins/Mapplic/mapplic/mapplic.js') }}" type="text/javascript"></script>
<!-- <script src="assets/plugins/jquery-flot/jquery.flot.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ asset('public/js/dashboard_v2.js') }}" type="text/javascript"></script>
</body>
</html>