{{-- <div class="mdslider">
    <ul class="navega">
        <li><a href="#" id="md-slide-nav-prew"><i class="fas fa-chevron-left"></i></a></li>
        <li><a href="#" id="md-slide-nav-next"><i class="fas fa-chevron-right"></i></a></li>
    </ul>
    @foreach ($slider as $s)
    <div class="md-slider-item">
        <div class="row">
            <div class="col-md-7 title">
                <span>
                    {{$s->title}}{!! html_entity_decode($s->content) !!}
                </span>
            </div>
            <div class="col-md-5 banner">
                <img class="img-fluid" src="{{ url('/uploads//'.$s->file_path.'/t_'.$s->imagen) }}" alt="{{ $s->title }}"> 
            </div>
        </div>
        
    </div>
    @endforeach
</div> --}}
 <div id="carouselExampleDark" class="carousel carousel-dark slide mtop32 shadow" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach ($slider as $s)
    @if ($s->sorden == "1")
    <div class="carousel-item active texts" data-bs-interval="4000">
        <div class="row texts">
            <div class="col-md-7 ">
                <div class="carousel-caption d-md-block texts">
                    <h2>{{$s->title}}</h2>
                    <a href="" class="btn btn-success">Detalles</a>
                    <p>{!! html_entity_decode($s->content) !!}</p>
                  </div>
            </div>
            <div class="col-md-5">
                <img class="d-block w-100" src="{{ url('/uploads//'.$s->file_path.'/t_'.$s->imagen) }}" alt="{{ $s->title }}"> 
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @foreach ($slider as $s)
    @if ($s->sorden != "1")
        <div class="carousel-item" data-bs-interval="4000">
            <div class="row">
                <div class="col-md-7">
                    <div class="carousel-caption d-md-block">
                        <h2>{{$s->title}}</h2>
                        <a href="" class="btn btn-success">Detalles</a>
                        <p>{!! html_entity_decode($s->content) !!} Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim tempora culpa ullam nulla quibusdam placeat quam nisi, molestiae aliquam esse provident alias voluptatum recusandae a numquam atque facere, ipsa dolore.</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <img class="d-block w-100" src="{{ url('/uploads//'.$s->file_path.'/t_'.$s->imagen) }}" alt="{{ $s->title }}"> 
                </div>
            </div>
        </div>
    @endif
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
    <i class="fas fa-chevron-left" aria-hidden="true" id="prev"></i>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
    <i class="fas fa-chevron-right" aria-hidden="true" id="next"></i>
    <span class="visually-hidden">Next</span>
  </a>
</div>