@extends('layouts.app')

@section('content')
	<div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <div class="well">
                    <h1>{{$article->title}}</h1>

                    <!-- Author -->
                    <p class="lead">
                        by <a href="#">{{$author}}</a>
                    </p>

                    <hr>

                    <!-- Date/Time -->
                    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$date}}</p>

                    <hr>

                    <!-- Preview Image -->
                    @if ($article->featured_img != '')
                    <img class="img-responsive" src="{{$article->featured_img}}" alt="">
                    @endif

                    <hr>

                    <!-- Post Content -->
                    {!!isset($article->content) ? $article->content : $article->description!!}
                    @if ($type == 'competition')
                    <hr>
                    <button type="button" class="btn btn-success btn-daftar">Daftar Kompetisi</button>
                    @endif
                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <!-- <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                     
                </div> -->

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Baca Juga</h4>
                        <div class="card">
	                        <ul class="list-group list-group-flush pad">
	                            <li class="list-group-item">
	                                <div class="list-image">
	                                    <img src="/image/car4.jpg">
	                                </div>
	                                <h5>Cras justo odio</h5>
	                                <p>
	                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
	                                </p>
	                            </li>
	                            <li class="list-group-item">
	                                <div class="list-image">
	                                    <img src="/image/car4.jpg">
	                                </div>
	                                <h5>Cras justo odio</h5>
	                                <p>
	                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
	                                </p>
	                            </li>
	                            <li class="list-group-item">
	                                <div class="list-image">
	                                    <img src="/image/car4.jpg">
	                                </div>
	                                <h5>Cras justo odio</h5>
	                                <p>
	                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
	                                </p>
	                            </li>
	                            <li class="list-group-item">
	                                <div class="list-image">
	                                    <img src="/image/car4.jpg">
	                                </div>
	                                <h5>Cras justo odio</h5>
	                                <p>
	                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
	                                </p>
	                            </li>
	                            <li class="list-group-item">
	                                <div class="list-image">
	                                    <img src="/image/car4.jpg">
	                                </div>
	                                <h5>Cras justo odio</h5>
	                                <p>
	                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
	                                </p>
	                            </li>
	                        </ul>
	                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <!-- <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div> -->

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>

@endsection