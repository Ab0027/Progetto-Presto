<x-layout>
    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-1 font-titolo">{{__('ui.detailOf')}} {{$article->title}}</h1>
            </div>
        </div>
    </div>
    <div class="container pt-5">
        <div class="row ">
            <div class="col-12 col-md-8 mx-auto  carousel-custom">
                <div id="carouselExampleFade" class="carousel slide carousel-fade ">
                  @if (count($article->images))  
                  <div class="carousel-inner justify-content-center">
                    @foreach ($article->images as $image)
                      <div class="carousel-item @if($loop->first)active @endif">
                        <img src="{{Storage::url($image->path)}}" class="img-custom" alt="...">
                      </div>
                    @endforeach  
                  </div>
                  @else
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="https://picsum.photos/201" class="  img-custom"  alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/202" class=" img-custom"  alt="...">
                      </div>
                    </div>
                  @endif

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div class="col-12 col-md-4 justify-content-center d-flex align-items-center flex-column mt-3 ">
              <h5 class="card-title">{{__('ui.title')}}: {{$article->title}}</h5>
              <p class="card-text">{{__('ui.description')}}: {{$article->body}}</p>
              <p class="card-text">{{__('ui.price')}}: {{$article->price}} €</p>
              <a href="{{route('categoryShow' , ['category' => $article->category])}}" class="btn btn-success">{{__('ui.category')}}: {{$article->category->name}}</a>
              <p class="card-footer">{{__('ui.publish')}} {{$article->created_at->format('d/m/Y')}} {{__('ui.from')}} {{$article->user->name ?? ''}}</p>
          </div>
        </div>
    </div>

</x-layout>