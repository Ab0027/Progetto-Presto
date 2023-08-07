<div class="slider-custom">
  <div class="load-custom">
  </div>
  <div class="content">
    <div class="principal">
      <h1>P R E S T O</h1>
      <p class="lead">{{__('ui.subtitleHeader')}}</p>
      <div class="container-sb">
        <form class="sb" method="GET" action="{{route('article.search')}}">
          <i class="fa-solid fa-magnifying-glass fa-search" style="color: #000000;"></i>
          <input type="search" placeholder="{{__('ui.searchHere')}}" class="input-sb" name="searched">
          <button type="submit" class="btn-sb">{{__('ui.search')}}</button>
        </form>
      </div>
    </div>
  </div>
</div>

