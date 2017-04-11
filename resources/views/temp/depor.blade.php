@extends('layouts.app')

@section('content')
<div class="container">
    <div id="myCarousel" class="carousel slide col-md-6 col-md-offset-3" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner flex-center position-ref" role="listbox">
            <div class="item active">
                <img src="/image/car1.jpg" alt="Wayang">
                <div class="carousel-caption">
                    <h3>Wayang</h3>
                    <p>Ini namanya Wayang. Baru tau ya?</p>
                </div>
            </div>

            <div class="item">
                <img src="image/car2.jpg" alt="Reog Ponorogo">
                <div class="carousel-caption">
                    <h3>Reog Ponorogo</h3>
                    <p>Budaya Reog ini berasal dari Ponorogo.</p>
                </div>
            </div>

            <div class="item">
                <img src="/image/car3.jpg" alt="Tari Kecak">
                <div class="carousel-caption">
                    <h3>Tari Kecak</h3>
                    <p>Ini namanya Tari Kecak. Kecak lho ya, bukan kecap.</p>
                </div>
            </div>

            <div class="item">
                <img src="/image/car4.jpg" alt="Tari Saman">
                <div class="carousel-caption">
                    <h3>Tari Saman</h3>
                    <p>Hayo tebak tarian ini asalnya dari mana?.</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading {{ $name }}-color-dark">Berita & Artikel</div>
                <div class="panel-body {{ $name }}-color-light">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            @foreach($articles as $article)
                            <li class="list-group-item">
                                <div class="list-image">
                                @if ($article->featured_img != '')                                    
                                    <img class="img-responsive" src="{{$article->featured_img}}" alt="">
                                @endif
                                </div>
                                <a href="{{route('readArticle', ['id'=>$article->id, 'dept'=>'senbud'])}}"><h5>{{$article->title}}</h5></a>
                                <p>
                                    {{str_limit(strip_tags($article->content), 100)}}
                                </p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading {{ $name }}-color-dark">Kompetisi</div>
                <div class="panel-body {{ $name }}-color-light">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            @foreach($competitions as $competition)
                            <li class="list-group-item">
                                <div class="list-image">
                                    <img src="/image/car4.jpg">
                                </div>
                                <a href="{{route('readCompetition', ['id'=>$competition->id, 'dept'=>'senbud'])}}"><h5>{{$competition->title}}</h5></a>
                                <p>
                                    {{str_limit(strip_tags($competition->description), 100)}}
                                </p>
                            </li>
                            @endforeach                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <section id="contribute" class="position-ref full-height unscroll">
  <div class="content text-center mar-top">
      <div class="title">
        Kami Butuh Bantuanmu!
      </div>
      <p class="desc header-subtitle m-b-md">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Phasellus ultrices nisl quis orci imperdiet dictum.<br>
        Mauris mollis dolor in tortor mollis, id feugiat neque suscipit.<br>
        Maecenas rhoncus vulputate dolor, a lobortis enim. Aliquam ac tortor purus.<br>
        Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<br>
        Ut vitae orci ligula. Cras varius, odio non mollis luctus, velit nibh aliquam dui, nec fringilla eros sem vitae arcu.
      </p>

      <div class="row-search">
        <a><button class="btn btn-warning yellow-btn" type="button" name="support">Mari Berkontribusi!</button></a>
      </div>
  </div>

  <div class="cover full-height"></div>
  <img class="bottom full-height" src="/image/feb.jpg" alt="Universitas Indonesia">

  <div class="gradient-black-side direction-top flex-center"></div>
  <div class="gradient-black direction flex-center"></div>
</section> -->
@endsection
