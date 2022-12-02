<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>

    @include('layouts.includes.web-font-load')

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atlantis.css') }}">
</head>
<body>
<div class="wrapper">
    @include('layouts.includes.admin-header')
    @include('layouts.includes.admin-sidebar')

    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                @yield('content')
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="http://www.themekita.com">
                                ThemeKita
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Help
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright ml-auto">
                    2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Core JS Files -->
<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Moment JS -->
<script src="{{ asset('assets/js/plugin/moment/moment.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- Bootstrap Toggle -->
<script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

<!-- Google Maps Plugin -->
<script src="{{ asset('assets/js/plugin/gmaps/gmaps.js') }}"></script>

<!-- Dropzone -->
<script src="{{ asset('assets/js/plugin/dropzone/dropzone.min.js') }}"></script>

<!-- Fullcalendar -->
<script src="{{ asset('assets/js/plugin/fullcalendar/fullcalendar.min.js') }}"></script>

<!-- DateTimePicker -->
<script src="{{ asset('assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Bootstrap Tagsinput -->
<script src="{{ asset('assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>

<!-- Bootstrap Wizard -->
<script src="{{ asset('assets/js/plugin/bootstrap-wizard/bootstrapwizard.js') }}"></script>

<!-- jQuery Validation -->
<script src="{{ asset('assets/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset('assets/js/plugin/summernote/summernote-bs4.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('assets/js/plugin/select2/select2.full.min.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Owl Carousel -->
<script src="{{ asset('assets/js/plugin/owl-carousel/owl.carousel.min.js') }}"></script>

<!-- Magnific Popup -->
<script src="{{ asset('assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js') }}"></script>

<!-- Atlantis JS -->
<script src="{{ asset('assets/js/atlantis.min.js') }}"></script>
</body>
</html>
