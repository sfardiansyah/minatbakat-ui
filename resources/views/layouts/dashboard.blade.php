<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}} - @yield('page_title')</title>    
    <link href="{{asset('css/app.css')}}" rel="stylesheet">    
    <link href="{{asset('admin/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">    
    <link href="{{asset('admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">    
    <link href="{{asset('admin/vendor/morrisjs/morris.css')}}" rel="stylesheet">    
    <link href="{{asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootbox.min.js')}}"></script>    
    <script src="{{ asset('ckeditor/ckeditor.js')}}"></script> 

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

    <div id="wrapper">        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">{{config('app.name')}}</a>
            </div>            

            <ul class="nav navbar-top-links navbar-right">                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{route('changePasswordUser')}}"><i class="fa fa-user fa-fw"></i> Change Password</a></li>                       
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>                        

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>                    
                </li>                
            </ul>
            
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">                        
                        <li><a href="{{route('dashboard')}}"><i class="fa fa-home fa-fw"></i> Dashboard</a></li>
                        <li><a href="{{route('viewArticle')}}"><i class="fa fa-newspaper-o fa-fw"></i> Artikel</a></li>
                        <li><a href="{{route('viewCompetition')}}"><i class="fa fa-trophy fa-fw"></i> Kompetisi</a></li>
                        @can('admin-access')
                        <li><a href="{{route('viewGroup')}}"><i class="fa fa-group fa-fw"></i> Grup Pengguna</a></li>
                        <li><a href="{{route('viewUser')}}"><i class="fa fa-users fa-fw"></i> Pengguna</a></li>                        
                        @endcan
                    </ul>
                </div>                
            </div>            
        </nav>

        <div id="page-wrapper" style="min-height: 100vh">
          <div class="row"><div class="col-lg-12"><h1 class="page-header">@yield('page_title')</h1></div></div>            
          @yield('content')                  
        </div>            
    </div>    
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/vendor/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('admin/vendor/raphael/raphael.min.js')}}"></script>    
    <script src="{{asset('admin/dist/js/sb-admin-2.js')}}"></script>    
</body>
</html>
