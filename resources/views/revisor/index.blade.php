<x-layout>

<div class="container-fluid" id="test">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-1 font-titolo">
                    {{ $article_to_check ? __('ui.articleRevision') : __('ui.noAnnouncementRevisor') }}</h1>
            </div>
        </div>
    </div>
    @if ($article_to_check)
        <div class="card-wrapper-detail mt-3">
            <div class="card">
                <!-- card left -->
                <div class="product-imgs px-4">
                    @if (count($article_to_check->images))
                        <div class="img-display">
                            <div class="img-showcase">
                                @foreach ($article_to_check->images as $image)
                                    <img src="{{ $image->getUrl(400, 300) }}" class="" alt="...">
                                @endforeach
                            </div>
                        </div>
                        <div class="img-select">
                            @php
                                $counter = 1;
                            @endphp

                            @foreach ($article_to_check->images as $image)
                                <div class="img-item">
                                    <a href="#" data-id="{{ $counter }}">
                                        <img src="{{ $image->getUrl(400, 300) }}">
                                    </a>
                                </div>
                                @php
                                    $counter++;
                                @endphp
                            @endforeach
                        </div>
                    @else
                        <div class="img-display py-4">
                            <div class="img-showcase">
                                <img src="/img/imgDefault.png" class="" alt="...">
                                <img src="/img/imgDefault.png">
                                <img src="/img/imgDefault.png">
                                <img src="/img/imgDefault.png">
                            </div>
                        </div>
                        <div class="img-select">
                            <div class="img-item">
                                <a href="#" data-id="1">
                                    <img src="/img/imgDefault.png" alt="shoe image">
                                </a>
                            </div>
                            <div class="img-item">
                                <a href="#" data-id="2">
                                    <img src="/img/imgDefault.png" alt="shoe image">
                                </a>
                            </div>
                            <div class="img-item">
                                <a href="#" data-id="3">
                                    <img src="/img/imgDefault.png" alt="shoe image">
                                </a>
                            </div>
                            <div class="img-item">
                                <a href="#" data-id="4">
                                    <img src="/img/imgDefault.png" alt="shoe image">
                                </a>
                            </div>
                        </div>
                    @endif
                </div>


                <!-- card right -->
                <div class="product-content">
                    <h2 class="product-title"> {{ $article_to_check->title }}</h2>



                    <div class="product-price">
                        <p class="new-price">{{ __('ui.price') }}: {{ $article_to_check->price }} €</p>
                    </div>

                    <div class="product-detail">
                        <p>{{ __('ui.description') }}: {{ $article_to_check->body }}</p>
                        <p>{{ __('ui.category') }}: <a
                                href="{{ route('categoryShow', ['category' => $article_to_check->category]) }}"
                                class="a-color">{{ $article_to_check->category->name }}</a></p>
                        <p>{{ __('ui.publish') }} {{ $article_to_check->created_at->format('d/m/Y') }}
                            {{ __('ui.from') }} {{ $article_to_check->user->name ?? '' }}</p>
                    </div>



                    <div class="container">
                        <div class="row">

                            <div class="col-12">
                              @if (!empty($image))
                                <div class="product-detail text-center">
                                    <h4 class="tc-accent pb-3">Revisione Immagini</h4>                                   
                                        <span>Adulti: <span class="{{ $image->adult }}"></span></span>
                                        <span>Satira: <span class="{{ $image->spoof }}"></span></span>
                                        <span>Medicina: <span class="{{ $image->medical }}"></span></span>
                                        <span>Violenza: <span class="{{ $image->violence }}"></span></span>
                                        <br>
                                        <span>Contenuto Ammiccante: <span class="{{ $image->racy }}"></span></span>
                                </div>
                            </div>
                            <div class="col-12 text-center pt-3">
                                @if ($image->labels)
                                    @foreach ($image->labels as $label)
                                        <p class="d-inline">#{{ $label }}</p>
                                    @endforeach
                                @endif
    @endif
    </div>
    </div>
    </div>


    <div class="container pt-5">
        <div class="row text-center">

            <div class="col-6 pb-2 icon-custom">
                <form action="{{ route('revisor.accept_article', ['article' => $article_to_check]) }}"method='POST'>
                    @csrf
                    @method('PATCH')
                    <button type="submit"class="btn"><i class="fa-regular fa-circle-check fa-4x"
                            style="color: #005555;"></i></button>
                </form>
            </div>
            <div class="col-6 pb-2 icon-custom">
                <form action="{{ route('revisor.reject_article', ['article' => $article_to_check]) }}"method='POST'>
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn"><i class="fa-regular fa-circle-xmark fa-4x"
                            style="color: #d40c0c;"></i></button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    @endif
    @if (session()->has('message'))
        <x-alertRevisor :message="session('message')"></x-alertRevisor>
    @endif

</x-layout>
