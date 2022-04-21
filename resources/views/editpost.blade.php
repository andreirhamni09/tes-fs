<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.1.1
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('public/assets/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('public/assets/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('public/assets/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/assets/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('public/assets/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('public/assets/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/assets/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('public/assets/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/assets/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('public/assets/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('public/assets/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('public/assets/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('public/assets/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('public/vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/vendors/simplebar.css') }}">
    <!-- Main styles for this application-->
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="{{ asset('public/css/examples.css') }}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
    <link href="{{ asset('public/vendors/@coreui/chartjs/css/coreui-chartjs.css') }}" rel="stylesheet">
</head>

<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <a class="nav-link text-white" href="{{ url('/') }}">
                <h2>POST</h2>
            </a>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link active" href="{{ url('/semuapost') }}">All Post</a></li>
                <li class="nav-item"><a class="nav-link" id="add" href="{{ url('/tambahbaru') }}">Add New</a></li>
                <li class="nav-item"><a class="nav-link" id="preview" href="{{ url('/preview') }}">Preview</a></li>
            </ul>
        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <i class="fas fa-bars"></i>
                </button>
                <a class="header-brand d-md-none" href="#">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use xlink:href="assets/brand/coreui.svg#full"></use>
                    </svg></a>
                <ul class="header-nav d-none d-md-flex">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/editpost/'.$id) }}">Edit Post</a></li>
                </ul>
                <ul class="header-nav ms-auto">
                </ul>
            </div>
        </header>

        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header"><strong>Edit Post</strong></div>                            
                                <div class="card-body">                            
                                    <div class="example">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control" id="title" placeholder="Judul Artikel" value="{{ $getpost['title'] }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                                            <textarea class="form-control" name="content" id="content" rows="3" placeholder="Tulis Kontent">{{ $getpost['content'] }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Category</label>
                                            <input type="text" name="category" class="form-control" id="category" placeholder="Kategory" value="{{ $getpost['category'] }}">
                                        </div>
                                        <label for="exampleFormControlInput1" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select" aria-label="Default select example">
                                            @php
                                                $arr_status = array("publish", "draft");
                                            @endphp
                                            @foreach($arr_status as $sts)
                                                @if($sts == $getpost['status'])
                                                    <option value="{{ $getpost['status'] }}" selected>{{ ucwords($getpost['status']) }}</option>  
                                                @else
                                                    <option value="{{ $sts }}">{{ucwords($sts)}}</option>
                                                @endif
                                            @endforeach  
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" onclick="update(<?php echo $id;?>)" type="button">Update</button>
                                </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('public/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('public/vendors/simplebar/js/simplebar.min.js') }}"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="{{ asset('public/vendors/chart.js/js/chart.min.js') }}"></script>
    <script src="{{ asset('public/vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
    <script src="{{ asset('public/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
    <script src="{{ asset('public/js/main.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function update(id)
        {
            var title      = $('#title').val();
            var content    = $('#content').val();
            var category   = $('#category').val();
            var status     = $('#status').val();
            $.ajax({
                url: "{{ url('/api/article') }}/"+id,
                method: "post",
                data: {
                    title       : title,   
                    content     : content,
                    category    : category,
                    status      : status
                },
                success: function(data) {
                    if(data == "Artikel Berhasil Diupdate")
                    {
                        alert(data);
                        window.location.href = "{{ url('/semuapost') }}";
                    }
                    else{
                        var msg = "";
                        if(data.title != undefined) {
                            msg += data.title + "\n";
                        }
                        else{
                            msg += "";
                        }
                        
                        if(data.content != undefined) {
                            msg += data.content + "\n";
                        }
                        else{
                            msg += "";
                        }

                        
                        if(data.category != undefined) {
                            msg += data.category + "\n";
                        }
                        else{
                            msg += "";
                        }
                        
                        if(data.status != undefined) {
                            msg += data.status + "\n";
                        }
                        else{
                            msg += "";
                        }
                        alert(msg);
                    }
                },
                error: function(data) {
                    alert('Gagal');
                }
            });
        }
    </script>

</body>

</html>