<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- Mirrored from exon.arsaland.com/html/pages/layouts/layout-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Aug 2020 12:58:03 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Exon Admin Dashboard Template</title>
    <meta name="description" content="Exon Admin Dashboard Template">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png"  width="500" height="600" href="{{asset('assets/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('assets/apple-touch-icon.png')}}">

    <link rel="stylesheet" href="{{asset('css/vendor.css')}}">

    <link rel="stylesheet" href="{{asset('vendor/jquery-file-upload/css/jquery.fileupload.css')}}">


    <link rel="stylesheet" href="{{asset('vendor/uppy/uppy.min.css')}}">

    <link rel="stylesheet" href="{{asset('vendor/jquery-dataTables/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/jquery-dataTables/css/buttons.bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
    <!-- Dosis & Poppins Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;523;600;700;800&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Page's links to CSS dependencies goes here. -->

    <link rel="stylesheet" href="{{asset('vendor/ari_d/js-list-manager/js-list-manager.css')}}">


    <link rel="stylesheet" href="{{asset('layouts/layout-1/css/app8bb9.css?v=545')}}">

    <link rel="stylesheet" href="{{asset('css/invoices/invoices.css')}}">

    <link rel="stylesheet" href="{{asset('vendor/select2/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('vendor/morrisjs/morris.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/apexcharts/apexcharts.css')}}">

    <link rel="stylesheet" href="{{asset('vendor/chartjs/Chart.min.css')}}">


    <link rel="stylesheet" href="{{asset('vendor/switchery/switchery.css')}}">


    <link rel="stylesheet" href="{{asset('css/auth.css')}}">


    <script src="{{asset('vendor/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('js/pages/charts/chartjs/utils.js')}}"></script>
    <script src="{{asset('js/pages/charts/chartjs/line.js')}}"></script>

    <!-- Page style codes or css links goes here. -->


    <!-- Setting website's root url for the api calls. -->
    <script type="text/javascript">
        window.ROOT_URL = ""
    </script>

</head>
{{-- <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <style>
            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }

            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked+.slider {
                background-color: #2196F3;
            }

            input:focus+.slider {
                box-shadow: 0 0 1px #2196F3;
            }

            input:checked+.slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
            }

            body {
                color: #566787;
                background: #f5f5f5;
                font-family: 'Varela Round', sans-serif;
                font-size: 13px;
            }

            .table-responsive {
                margin: 30px 0;
            }

            .table-wrapper {
                background: #fff;
                padding: 20px 25px;
                border-radius: 3px;
                min-width: 1000px;
                box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            }

            .table-title {
                padding-bottom: 15px;
                background: #435d7d;
                color: #fff;
                padding: 16px 30px;
                min-width: 100%;
                margin: -20px -25px 10px;
                border-radius: 3px 3px 0 0;
            }

            .table-title h2 {
                margin: 5px 0 0;
                font-size: 24px;
            }

            .table-title .btn-group {
                float: right;
            }

            .table-title .btn {
                color: #fff;
                float: right;
                font-size: 13px;
                border: none;
                min-width: 50px;
                border-radius: 2px;
                border: none;
                outline: none !important;
                margin-left: 10px;
            }

            .table-title .btn i {
                float: left;
                font-size: 21px;
                margin-right: 5px;
            }

            .table-title .btn span {
                float: left;
                margin-top: 2px;
            }

            table.table tr th,
            table.table tr td {
                border-color: #e9e9e9;
                padding: 12px 15px;
                vertical-align: middle;
            }

            table.table tr th:first-child {
                width: 60px;
            }

            table.table tr th:last-child {
                width: 100px;
            }

            table.table-striped tbody tr:nth-of-type(odd) {
                background-color: #fcfcfc;
            }

            table.table-striped.table-hover tbody tr:hover {
                background: #f5f5f5;
            }

            table.table th i {
                font-size: 13px;
                margin: 0 5px;
                cursor: pointer;
            }

            table.table td:last-child i {
                opacity: 0.9;
                font-size: 22px;
                margin: 0 5px;
            }

            table.table td a {
                font-weight: bold;
                color: #566787;
                display: inline-block;
                text-decoration: none;
                outline: none !important;
            }

            table.table td a:hover {
                color: #2196F3;
            }

            table.table td a.edit {
                color: #FFC107;
            }

            table.table td a.delete {
                color: #F44336;
            }

            table.table td i {
                font-size: 19px;
            }

            table.table .avatar {
                border-radius: 50%;
                vertical-align: middle;
                margin-right: 10px;
            }

            .pagination {
                float: right;
                margin: 0 0 5px;
            }

            .pagination li a {
                border: none;
                font-size: 13px;
                min-width: 30px;
                min-height: 30px;
                color: #999;
                margin: 0 2px;
                line-height: 30px;
                border-radius: 2px !important;
                text-align: center;
                padding: 0 6px;
            }

            .pagination li a:hover {
                color: #666;
            }

            .pagination li.active a,
            .pagination li.active a.page-link {
                background: #03A9F4;
            }

            .pagination li.active a:hover {
                background: #0397d6;
            }

            .pagination li.disabled i {
                color: #ccc;
            }

            .pagination li i {
                font-size: 16px;
                padding-top: 6px
            }

            .hint-text {
                float: left;
                margin-top: 10px;
                font-size: 13px;
            }

            /* Custom checkbox */
            .custom-checkbox {
                position: relative;
            }

            .custom-checkbox input[type="checkbox"] {
                opacity: 0;
                position: absolute;
                margin: 5px 0 0 3px;
                z-index: 9;
            }

            .custom-checkbox label:before {
                width: 18px;
                height: 18px;
            }

            .custom-checkbox label:before {
                content: '';
                margin-right: 10px;
                display: inline-block;
                vertical-align: text-top;
                background: white;
                border: 1px solid #bbb;
                border-radius: 2px;
                box-sizing: border-box;
                z-index: 2;
            }

            .custom-checkbox input[type="checkbox"]:checked+label:after {
                content: '';
                position: absolute;
                left: 6px;
                top: 3px;
                width: 6px;
                height: 11px;
                border: solid #000;
                border-width: 0 3px 3px 0;
                transform: inherit;
                z-index: 3;
                transform: rotateZ(45deg);
            }

            .custom-checkbox input[type="checkbox"]:checked+label:before {
                border-color: #03A9F4;
                background: #03A9F4;
            }

            .custom-checkbox input[type="checkbox"]:checked+label:after {
                border-color: #fff;
            }

            .custom-checkbox input[type="checkbox"]:disabled+label:before {
                color: #b8b8b8;
                cursor: auto;
                box-shadow: none;
                background: #ddd;
            }

            /* Modal styles */
            .modal .modal-dialog {
                max-width: 400px;
            }

            .modal .modal-header,
            .modal .modal-body,
            .modal .modal-footer {
                padding: 20px 30px;
            }

            .modal .modal-content {
                border-radius: 3px;
                font-size: 14px;
            }

            .modal .modal-footer {
                background: #ecf0f1;
                border-radius: 0 0 3px 3px;
            }

            .modal .modal-title {
                display: inline-block;
            }

            .modal .form-control {
                border-radius: 2px;
                box-shadow: none;
                border-color: #dddddd;
            }

            .modal textarea.form-control {
                resize: vertical;
            }

            .modal .btn {
                border-radius: 2px;
                min-width: 100px;
            }

            .modal form label {
                font-weight: normal;
            }

        </style>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Exon Admin Dashboard Template</title>
    <meta name="description" content="Exon Admin Dashboard Template">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{asset('assets/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('assets/apple-touch-icon.png')}}">

    <link rel="stylesheet" href="{{asset('css/vendor.css')}}">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
    <!-- Dosis & Poppins Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;523;600;700;800&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet"/>

    <!-- Page's links to CSS dependencies goes here. -->



    <link rel="stylesheet" href="{{asset('layouts/layout-1/css/app8bb9.css?v=545')}}"/>

    <!-- Page style codes or css links goes here. -->

    <style type="text/css">
        .page-content {
            background-color: #ffffff;
        }

    </style>


    <!-- Setting website's root url for the api calls. -->
    <script type="text/javascript">
        window.ROOT_URL = "../../../index.html"

    </script>
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

</head> --}}

<body>
    @livewireStyles

    <!-- Anything prepended to the body will be placed here. -->

    <!-- Wrapper Arround The Page -->
    <div class="page-wrapper sidebar-open navbar-fixed ">

        <!-- Sidebar -->
        @include('layout.sidebar')

        <!-- / Sidebar -->

        <main class="main-content">

            <div class="sidebar-backdrop"></div>

            <!-- Header Nav -->
            @include('layout.header')
            <!-- / Header Nav -->

            <div class="page-container">

                <!-- Main Page Content -->
                <div class="page-content">
                    @yield('content')



                </div><!-- / .page-content -->
                <!-- Main Page Content -->

                <!-- Footer -->
                {{-- @include('layout.footer') --}}
                <!-- / .copyright -->
                <!-- / Footer -->

            </div><!-- / .page-container -->


        </main><!-- / .main-content -->

    </div><!-- / .page-wrapper -->
    <!-- / Wrapper Arround The Page -->


    <script src="{{asset('js/vendor.js')}}"></script>

    <!-- Page's links to JS dependencies goes here. -->

    <script src="{{asset('vendor/jquery-dataTables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-dataTables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-dataTables/js/buttons.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('js/pages/form/extended/datetimepicker.js')}}"></script>


    <!-- Page script codes or links goes here. -->
    
    <script src="{{asset('js/pages/datatables/datatables.net/toolbar.js')}}"></script>

    <script src="{{asset('layouts/layout-1/js/app.js')}}"></script>

    <!-- Page script codes or links goes here. -->
    
    <script src="{{asset('vendor/jquery-dataTables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-dataTables/js/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page script codes or links goes here. -->
    
    <script src="{{asset('js/pages/datatables/datatables.net/column-search.js')}}"></script>
    <script src="{{asset('js/pages/applications/chat/chat-1.js')}}"></script>


    <script src="{{asset('js/pages/form/file-upload/jquery-upload.js')}}"></script>
    <script src="{{asset('vendor/jquery-file-upload/js/jquery.fileupload.js')}}"></script>
    <script src="{{asset('vendor/checkboxesjs/jquery.checkboxes-1.2.2.min.js')}}"></script>


    <script src="{{asset('vendor/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('js/pages/form/extended/select2.js')}}"></script>


    <script src="{{asset('js/pages/widgets/widgets-chart.js')}}"></script>


    <script src="{{asset('vendor/switchery/switchery.js')}}"></script>

@yield('extra-js')

@livewireScripts
<script src="{{asset('js/pages/index.js')}}"></script>
</body>

<!-- Mirrored from exon.arsaland.com/html/pages/layouts/layout-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Aug 2020 12:58:03 GMT -->

</html>
