<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VeggieBox</title>

    <link href="{{ asset('inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('inspinia/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/style.css') }}" rel="stylesheet">

    <!-- Data Tables -->
    <link href="{{ asset('inspinia/css/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/dataTables/dataTables.responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/dataTables/dataTables.tableTools.min.css') }}" rel="stylesheet">

    <!-- note -->
    <link href="{{ asset('bower_components/summernote/dist/summernote.css') }}" rel="stylesheet">

    {{-- gallery --}}
    <link href="{{ asset('inspinia/css/plugins/blueimp/css/blueimp-gallery.css') }}" rel="stylesheet">

    {{-- sweet-alert --}}
    <link href="{{ asset('bower_components/sweetalert/dist/sweetalert.css') }}" rel="stylesheet">

    <link href="{{ asset('inspinia/css/plugins/chartist/chartist.min.css') }}" rel="stylesheet">

    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <style type="text/css">
        .td-center {
            text-align:center; 
            vertical-align:middle;
        }
    </style>

    @yield('admin-css')

</head>

<body>

@yield('app')

<!-- Mainly scripts -->
<script src="{{ asset('inspinia/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('inspinia/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('inspinia/js/inspinia.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/pace/pace.min.js') }}"></script>

<!-- Date Table -->
<script src="{{ asset('inspinia/js/plugins/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/dataTables/dataTables.responsive.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/dataTables/dataTables.tableTools.min.js') }}"></script>

<!-- Flot -->
{{-- <script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.time.js') }}"></script> --}}

<!-- Flot demo data -->
{{-- <script src="{{ asset('inspinia/js/demo/flot-demo.js') }}"></script> --}}

<!-- Chartist -->
<script src="{{ asset('inspinia/js/plugins/chartist/chartist.min.js') }}"></script>

{{-- sweetalert --}}
<script src="{{ asset('bower_components/sweetalert/dist/sweetalert.min.js') }}"></script>

{{-- chosen --}}
{{-- <script src="{{ asset('inspinia/js/plugins/chosen/chosen.jquery.js') }}"></script> --}}

{{-- gallery --}}
<script src="{{ asset('inspinia/js/plugins/blueimp/jquery.blueimp-gallery.min.js') }}"></script>

{{-- summernote --}}
<script src="{{ asset('bower_components/summernote/dist/summernote.min.js') }}"></script>

{{-- angularjs --}}
<script src="{{ asset('bower_components/angular/angular.min.js') }}"></script>
<script src="{{ asset('app/app.js') }}"></script>
<script src="{{ asset('app/controller.js') }}"></script>

<!-- ChartJS-->
<script src="{{ asset('bower_components/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('bower_components/chart.js/dist/Chart.bundle.min.js') }}"></script>


<!-- Include this after the sweet alert js file -->
@include('sweet::alert')

@yield('admin-js')


</body>

</html>
