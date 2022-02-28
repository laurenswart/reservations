<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Representations</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
        <link rel="stylesheet" href="{{ asset('css/welcome.css')}}">
        <link rel="stylesheet" href="{{ asset('css/nav.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="antialiased">
         <!-- Page Heading -->
         @include('layouts.navigation')
        <!-- End Top Bar -->

        <div class="wrap">
            <button onclick="prev()"><i class="fa-solid fa-angle-left"></i></button>
            <div class="scroller">
                <ul class="items">
                @foreach($showsForSlider as $i => $showForSlider)
                <li class="item" style="background-image:url({{ asset('images/show_posters/'.$showForSlider->poster_url)}}">{{ $showForSlider->title }}</li>
                @endforeach 
                </ul>
            </div>
            <button onclick="next()"><i class="fa-solid fa-angle-right"></i></button>
        </div>

        <hr>

        <div class="row column text-center">
            <h2>Prochaines Représentations</h2>
        </div>

        <hr>

        <div class="row small-up-2 large-up-4">
            @if(!$nextRepresentations->isEmpty())
                @foreach($nextRepresentations as $representation)
                <div class="column">
                    <img class="thumbnail" src="{{ asset('images/show_posters/'.$representation->show->poster_url)}}">
                    <h5>{{ $representation->show->title}}</h5>
                    <p>{{ $representation->when }}<br>
                    {{$representation->location->designation }}</p>
                    <a href="#" class="button expanded">Réserver</a>
                </div>
                @endforeach
            @else 
                <p>Aucune représentation à venir.</p>
            @endif
        </div>

        <hr>

        <div class="row column text-center">
            <h2>Lieux de spectacles</h2>
        </div>
        <hr>
        <div class="row">
            @foreach($locations as $id => $location)
            @if ($id%3==0)
                <div class="medium-4 columns">
            @endif
            <div class="media-object">
                <div class="media-object-section">
                <a href="{{ $location->website }}"><i class="fa-solid fa-link"></i></a>
                </div>
                <div class="media-object-section">
                    <h5>{{ $location->designation }}</h5>
                    <p>{{ $location->address }}<br>{{ $location->locality->postal_code }} {{ $location->locality->locality }}</p>
                </div>
            </div>
            @if ($id%3==2 || $id==count($locations)-1)
                </div>
            @endif
            @endforeach
                
           
        </div>

        <footer class="callout large secondary" id="footer">
            <div class="row">
                <div class="large-4 columns">
                    <h5>Vivamus Hendrerit Arcu Sed Erat Molestie</h5>
                    <p>Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie augue sit.</p>
                </div>
                <div class="large-3 large-offset-2 columns">
                    <ul class="menu vertical">
                        <li><a href="#">One</a></li>
                        <li><a href="#">Two</a></li>
                        <li><a href="#">Three</a></li>
                        <li><a href="#">Four</a></li>
                    </ul>
                </div>
                <div class="large-3 columns">
                    <ul class="menu vertical">
                        <li><a href="#">One</a></li>
                        <li><a href="#">Two</a></li>
                        <li><a href="#">Three</a></li>
                        <li><a href="#">Four</a></li>
                    </ul>
                </div>
            </div>
        </footer>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script src="{{ asset('js/slider.js') }}"></script>
<script>
  $(document).foundation();
</script>
</body>
</html>
