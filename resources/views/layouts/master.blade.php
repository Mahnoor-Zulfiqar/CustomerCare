

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <link href='{{asset('css/chosen.min.css')}}' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> -->
    <link rel="stylesheet" href="{{asset('css/prism.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosen.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{asset('css/tempusdominus-bootstrap-4.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/icheck-bootstrap.min.css')}}">


    <!-- <link rel="stylesheet" href="'plugins/icheck-bootstrap/icheck-bootstrap.min.css'"> -->

    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/OverlayScrollbars.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}">
<style>
.chosen-container-single .chosen-single{height: 35px !important;padding:4px 0 0 8px !important;}

    </style>
    <link rel="stylesheet" href="{{asset('css/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
    <script nonce="55c67dce-9a88-4f4b-9a65-1696a9299733">(function(w,d){!function(a,e,t,r,z){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]};var s=e.getElementsByTagName("title")[0];s&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.dataLayer=a.dataLayer||[],a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.dataLayer.push({"zaraz.start":(new Date).getTime()}),a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r);z.defer=!0,z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script></head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('images/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <!-- <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li> -->
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/logout')}}" class="nav-link">Logout</a>
            </li>
        </ul>


    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="index3.html" class="brand-link">
            <img src="{{asset('images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light" style="font-size:12px;">AAA Customer Care Department</span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image text-white">
                    {{Session::get('Name')}}
                </div>
                <div class="info">
                    <a href="#" class="d-block"></a>
                </div>
            </div>

            <div class="form-inline">
                <!-- <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div> -->
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item menu-open">
                        <a href="{{url('/home')}}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                {{-- <i class="right fas fa-angle-left"></i> --}}
                            </p>
                        </a>
                    </li>
                    @if(Session::get('role') && Session::get('role')== 'Head of Department' )

                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Dispositions
                                    <i class="right fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('add-disposition/'.config('globalconstants.CallType.OutBound'))}}" class="nav-link active">
                                        <i class="fa fa-plus-square nav-icon"></i>
                                        <p>Add Disposition</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('view-disposition')}}" class="nav-link">
                                        <i class="fa fa-info nav-icon"></i>
                                        <p>View Dispositions</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('view-disposition-detail')}}" class="nav-link">
                                        <i class="fa fa-building nav-icon"></i>
                                        <p>View Disposition Details</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                            <p>
                                Responses
                                <i class="right fas fa-angle-left "></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" >
                            <li class="nav-item">
                                <a href="{{url('view-ccd-response')}}" class="nav-link ">
                                    <i class="fa fa-eye nav-icon"></i>
                                    <p>View Responses</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('add-response')}}" class="nav-link">
                                    <i class="fa fa-plus-square nav-icon"></i>
                                    <p>Add Responses</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('report')}}" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                            <p>
                                Report
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>

    </aside>

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <!-- <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol> -->
                    </div>
                </div>
            </div>
        </div>


        <section class="content">
            <div class="container-fluid">

                <div class="row">

                    <section class="col-lg-12 connectedSortable">

                       @yield('content')


                        <!-- <div class="card direct-chat direct-chat-primary"> -->
                            <!-- <div class="card-header">
                                <h3 class="card-title">Direct Chat</h3>
                                <div class="card-tools">
                                    <span title="3 New Messages" class="badge badge-primary">3</span>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                                        <i class="fas fa-comments"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div> -->

                            <!-- <div class="card-body">

                                <div class="direct-chat-messages"> -->

                                    <!-- <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                        </div>

                                        <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">

                                        <div class="direct-chat-text">
                                            Is this template really for free? That's unbelievable!
                                        </div>

                                    </div> -->
<!--

                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                        </div>

                                        <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">

                                        <div class="direct-chat-text">
                                            You better believe it!
                                        </div>

                                    </div> -->
<!--

                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                        </div>

                                        <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">

                                        <div class="direct-chat-text">
                                            Working with AdminLTE on a great new app! Wanna join?
                                        </div>

                                    </div> -->
<!--

                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                        </div>

                                        <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">

                                        <div class="direct-chat-text">
                                            I would love to.
                                        </div>

                                    </div> -->

                                <!-- </div>


                                <div class="direct-chat-contacts"> -->
                                    <!-- <ul class="contacts-list">
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Avatar">
                                                <div class="contacts-list-info">
<span class="contacts-list-name">
Count Dracula
<small class="contacts-list-date float-right">2/28/2015</small>
</span>
                                                    <span class="contacts-list-msg">How have you been? I was...</span>
                                                </div>

                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user7-128x128.jpg" alt="User Avatar">
                                                <div class="contacts-list-info">
<span class="contacts-list-name">
Sarah Doe
<small class="contacts-list-date float-right">2/23/2015</small>
</span>
                                                    <span class="contacts-list-msg">I will be waiting for...</span>
                                                </div>

                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user3-128x128.jpg" alt="User Avatar">
                                                <div class="contacts-list-info">
<span class="contacts-list-name">
Nadia Jolie
<small class="contacts-list-date float-right">2/20/2015</small>
</span>
                                                    <span class="contacts-list-msg">I'll call you back at...</span>
                                                </div>

                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user5-128x128.jpg" alt="User Avatar">
                                                <div class="contacts-list-info">
<span class="contacts-list-name">
Nora S. Vans
<small class="contacts-list-date float-right">2/10/2015</small>
</span>
                                                    <span class="contacts-list-msg">Where is your new...</span>
                                                </div>

                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user6-128x128.jpg" alt="User Avatar">
                                                <div class="contacts-list-info">
<span class="contacts-list-name">
John K.
<small class="contacts-list-date float-right">1/27/2015</small>
</span>
                                                    <span class="contacts-list-msg">Can I take a look at...</span>
                                                </div>

                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user8-128x128.jpg" alt="User Avatar">
                                                <div class="contacts-list-info">
<span class="contacts-list-name">
Kenneth M.
<small class="contacts-list-date float-right">1/4/2015</small>
</span>
                                                    <span class="contacts-list-msg">Never mind I found...</span>
                                                </div>

                                            </a>
                                        </li>

                                    </ul> -->

                                <!-- </div>

                            </div> -->
<!--
                            <div class="card-footer">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                        <span class="input-group-append">
<button type="button" class="btn btn-primary">Send</button>
</span>
                                    </div>
                                </form>
                            </div> -->

                        <!-- </div> -->


                        <!-- <div class="card"> -->
                            <!-- <div class="card-header">
                                <h3 class="card-title">
                                    <i class="ion ion-clipboard mr-1"></i>
                                    To Do List
                                </h3>
                                <div class="card-tools">
                                    <ul class="pagination pagination-sm">
                                        <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                                        <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div> -->

                            <!-- <div class="card-body">
                                <ul class="todo-list" data-widget="todo-list">
                                    <li>

<span class="handle">
<i class="fas fa-ellipsis-v"></i>
<i class="fas fa-ellipsis-v"></i>
</span>

                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo1" id="todoCheck1">
                                            <label for="todoCheck1"></label>
                                        </div>

                                        <span class="text">Design a nice theme</span>

                                        <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>

                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
<span class="handle">
<i class="fas fa-ellipsis-v"></i>
<i class="fas fa-ellipsis-v"></i>
</span>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                                            <label for="todoCheck2"></label>
                                        </div>
                                        <span class="text">Make the theme responsive</span>
                                        <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
<span class="handle">
<i class="fas fa-ellipsis-v"></i>
<i class="fas fa-ellipsis-v"></i>
</span>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo3" id="todoCheck3">
                                            <label for="todoCheck3"></label>
                                        </div>
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
<span class="handle">
<i class="fas fa-ellipsis-v"></i>
<i class="fas fa-ellipsis-v"></i>
</span>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo4" id="todoCheck4">
                                            <label for="todoCheck4"></label>
                                        </div>
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
<span class="handle">
<i class="fas fa-ellipsis-v"></i>
<i class="fas fa-ellipsis-v"></i>
</span>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo5" id="todoCheck5">
                                            <label for="todoCheck5"></label>
                                        </div>
                                        <span class="text">Check your messages and notifications</span>
                                        <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
<span class="handle">
<i class="fas fa-ellipsis-v"></i>
<i class="fas fa-ellipsis-v"></i>
</span>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo6" id="todoCheck6">
                                            <label for="todoCheck6"></label>
                                        </div>
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->

                            <!-- <div class="card-footer clearfix">
                                <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
                            </div> -->
                        <!-- </div> -->

                    </section>


                    <section class="col-lg-5 connectedSortable">
<!--
                        <div class="card bg-gradient-primary">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    Visitors
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                        <i class="far fa-calendar-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>

                            </div> -->
                            <!-- <div class="card-body">
                                <div id="world-map" style="height: 250px; width: 100%;"></div>
                            </div> -->

                        <!-- </div> -->

                    </section>

                </div>

            </div>
        </section>

    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2022 <a href="http://aaa-associates.org/">AAA Associates</a>.</strong>
        All rights reserved.
        {{-- <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div> --}}
    </footer>

    <aside class="control-sidebar control-sidebar-dark">

    </aside>

</div>


<script src="{{asset('jquery/jquery.min.js') }}"></script>

<script src="{{asset('jquery/jquery-ui.min.js') }}"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="{{asset('jquery/bootstrap.bundle.min.js') }}"></script>

<script src="{{asset('js/Chart.min.js') }}"></script>

<script src="{{asset('js/sparkline.js') }}"></script>

<script src="{{asset('jquery/jqueryvmap/jquery.vmap.min.js') }}"></script>
<script src="{{asset('jquery/jqueryvmap/jquery.vmap.usa.js') }}"></script>

<script src="{{asset('jquery/jquery-knob/jquery.knob.min.js') }}"></script>

<script src="{{asset('jquery/moment/moment.min.js')}}"></script>
<script src="{{asset('jquery/moment/daterangepicker.js')}}"></script>

<script src="{{asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script src="{{asset('js/summernote-bs4.min.js')}}"></script>
<script type='text/javascript' src="{{asset('jquery/chosen.jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.overlayScrollbars.min.js') }}"></script>

<script src="{{asset('js/adminlte.js')}}"></script>

<script src="{{asset('js/demo.js') }}"></script>

<script src="{{asset('js/dashboard.js') }}"></script>

<script src="{{asset('js/app.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.proto.js

"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<!-- <script src="{{asset('js/popper.js') }}"></script> -->
@yield('scripts')
</body>

