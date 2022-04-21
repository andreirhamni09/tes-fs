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
    <title>All Post</title>
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
                    <li class="nav-item"><a class="nav-link" href="{{ url('/semuapost') }}">All Post</a></li>
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
                            <div class="card-header"><strong>All Post</strong></div>
                            <div class="card-body">
                                <div class="example">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <button class="nav-link active" id="published" data-coreui-toggle="tab" role="tab">
                                                Published ({{ count($publish) }}) 
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" id="drafts" target="_blank">
                                                Drafts ({{ count($draft) }})
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" id="trashed" target="_blank">
                                                Trashed ({{ count($thrash) }})
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content rounded-bottom">
                                        <table class="table" id="t_published">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($publish) !== 0)
                                                    @foreach($publish as $value)
                                                    <tr>
                                                        <td>{{ $value->title }}</td>
                                                        <td>{{ $value->category }}</td>
                                                        <td>
                                                            <a href="{{ url('/editpost/'.$value->id) }}" class="card-link"><i class="fas fa-edit"></i></a>
                                                            <input type="hidden" id="title{{$value->id}}" value="{{$value->title}}">
                                                            <input type="hidden" id="content{{$value->id}}" value="{{$value->content}}">
                                                            <input type="hidden" id="category{{$value->id}}" value="{{$value->category}}">
                                                            <a onclick="ToTrashed(<?php echo $value->id; ?>)" class="card-link"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="3">Belum Ada Data Publish</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>

                                        <table class="table" id="t_drafts" hidden>
                                            <thead>
                                                <tr>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($draft) !== 0)
                                                    @foreach($draft as $value)
                                                    <tr>
                                                        <td>{{ $value->title }}</td>
                                                        <td>{{ $value->category }}</td>
                                                        <td>
                                                            <a href="{{ url('/editpost/'.$value->id) }}" class="card-link"><i class="fas fa-edit"></i></a>
                                                            <input type="hidden" id="title{{$value->id}}" value="{{$value->title}}">
                                                            <input type="hidden" id="content{{$value->id}}" value="{{$value->content}}">
                                                            <input type="hidden" id="category{{$value->id}}" value="{{$value->category}}">
                                                            <a onclick="ToTrashed(<?php echo $value->id; ?>)" class="card-link"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="3">Belum Ada Data Draft</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>

                                        <table class="table" id="t_trashed" hidden>
                                            <thead>
                                                <tr>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($thrash) !== 0)
                                                    @foreach($thrash as $value)
                                                    <tr>
                                                        <td>{{ $value->title }}</td>
                                                        <td>{{ $value->category }}</td>
                                                        <td>
                                                            <a href="{{ url('/editpost/'.$value->id) }}" class="card-link"><i class="fas fa-edit"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="3">Belum Ada Data Draft</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
        
        $(function(){
            $("#published").click(function(){
                $(this).addClass("active");
                $("#t_published").attr("hidden", false);

                $("#drafts").removeClass("active");
                $("#t_drafts").attr("hidden", true);

                $("#trashed").removeClass("active");
                $("#t_trashed").attr("hidden", true);
            });
            $("#drafts").click(function(){
                $(this).addClass("active");
                $("#t_drafts").attr("hidden", false);

                $("#published").removeClass("active");
                $("#t_published").attr("hidden", true);

                $("#trashed").removeClass("active");
                $("#t_trashed").attr("hidden", true);
            });
            $("#trashed").click(function(){
                $(this).addClass("active");
                $("#t_trashed").attr("hidden", false);

                $("#published").removeClass("active");
                $("#t_published").attr("hidden", true);

                $("#drafts").removeClass("active");
                $("#t_drafts").attr("hidden", true);
            });
            
        })

        function ToTrashed(id){
            var title      = $('#title'+id+'').val();
            var content    = $('#content'+id+'').val();
            var category   = $('#category'+id+'').val();
            $.ajax({
                url: '{{ url("/api/article/") }}/'+id,
                method: "post",
                data: {
                    title       : title,   
                    content     : content,
                    category    : category,
                    status      : 'thrash'
                },
                success: function(data) {
                    if(data == "Artikel Berhasil Diupdate")
                    {                        
                        window.location.href = '{{ url("/semuapost/1") }}';
                    }
                },
                error: function(data) {
                    alert('Gagal');
                }
            });
        }        

        $(document).ready(function() { 
            var trashed = <?php echo $trashed;?>;
            if(trashed == 1)
            {
                $("#trashed").addClass("active");
                $("#t_trashed").attr("hidden", false);

                $("#published").removeClass("active");
                $("#t_published").attr("hidden", true);

                $("#drafts").removeClass("active");
                $("#t_drafts").attr("hidden", true);
            }
        });

        $(document.body).on("keydown", this,
            function (event) { 
                if (event.keyCode == 116 || event.keyCode == 17) { 
                    window.location.href = '{{ url("/semuapost") }}';
            } 
        });

    </script>

</body>

</html>