<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Representations</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
        <link rel="stylesheet" href="{{ asset('css/welcome.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/main.css') }}"/>
		<noscript><link rel="stylesheet" href="{{ asset('css/noscript.css') }}" /></noscript>
    </head>
    <!-- Header -->
    <div id="header">

        <!-- Inner -->
        <div class="inner">
            <header>
                <h1><a href="index.html" id="logo">The Case of Shows</a></h1>
                <hr />
                <p>Movies will make you famous, television will make you rich, but theater will make you good.</p>
            </header>
            <footer>
                <a href="#banner" class="button circled scrolly">Discover</a>
            </footer>
        </div>
        <!-- Nav -->
        @include('layouts.navigation')
    </div>
    <!-- Banner -->
    <section id="banner">
        <header>
            <h2>Shows to everyone's taste</h2>
            <p>Checkout out upcoming shows.
            </p>
        </header>
    </section>
    <!-- Carousel -->
    <section class="carousel">
        <div class="reel">
                <div class="row mt-2">
        @if(!$nextRepresentations->isEmpty())
            @foreach($nextRepresentations as $representation)
                <article class="col">
                    <a href="{{ route('representations_show', $representation->id) }}" class="image featured"><img src="{{ asset('images/show_posters/'.$representation->show->poster_url)}}" alt="" /></a>
                    <header>
                        <h3><a href="{{ route('representations_show', $representation->id) }}">{{ $representation->show->title}}</a></h3>
                    </header>
                    <p>{{ $representation->when }}<br>{{ $representation->location ? $representation->location->designation : 'Lieu Inconnu'}}</p>
                </article>
            @endforeach
        @else 
            <p>Aucune représentation à venir.</p>
        @endif
                </div>
        </div>
    </section>



        <!-- Main -->
				<div class="wrapper style2">

					<article id="main" class="container special">
						<a href="#" class="image featured"><img src="{{asset('images/logo/logo_black.png')}}" alt="logo" style="height:auto;" /></a>
						<header>
							<h2>Great Art Throughout Brussels</h2>
							<p>
                            The Case Of Shows features online theater ticketing for 
                            many shows, mostly happening in central Brussels. 
                            
							</p>
						</header>
						<p>
							Find trending shows, discover new artists and get the latest buzz. Curae suspendisse mauris posuere accumsan massa
							posuere lacus convallis tellus interdum. Amet nullam fringilla nibh nulla convallis ut venenatis purus
							sit arcu sociis. Nunc fermentum adipiscing tempor cursus nascetur adipiscing adipiscing. Primis aliquam
							mus lacinia lobortis phasellus suscipit. Fermentum lobortis non tristique ante proin sociis accumsan
							lobortis. Auctor etiam porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum
							consequat integer interdum integer purus sapien. Nibh eleifend nulla nascetur pharetra commodo mi augue
							interdum tellus. Ornare cursus augue feugiat sodales velit lorem. Semper elementum ullamcorper lacinia
							natoque aenean scelerisque.
						</p>
						<footer>
							<a href="{{ route('locations_index') }}" class="button">Checkout our Locations</a>
						</footer>
					</article>

				</div>

			<!-- Features -->
            @if(count($popularShows)>0)
				<div class="wrapper style1">
					<section id="features" class="container special">
						<header>
							<h2>Popular at the moment</h2>
							<p>Found out which shows are attracting the most bookings and reserve your seats before it's too late !</p>
						</header>
						<div class="row">
                            @foreach($popularShows as $show)
							<article class="col-4 col-12-mobile special">
								<a href="{{ route('shows_show', $show->id) }}" class="image featured"><img src="{{  asset('images/show_posters/'.$show->poster_url) }}" alt="" /></a>
								<header>
									<h3><a href="{{ route('shows_show', $show->id) }}">{{ $show->title }}</a></h3>
								</header>
								<p class="d-flex justify-content-between">
                                    <span><strong>Prix:</strong> {{ $show->price ? $show->price.'€' : 'Inconnu' }}</span>
                                    
                                    <a class="button"  href="{{ route('shows_show', $show->id) }}">
                                        @if($show->bookable)
                                            Book
                                        @else
                                            Checkout
                                        @endif
                                        </a>
                                    
                                </p>
							</article>
                            @endforeach
						</div>
					</section>
				</div>
            @endif

			<!-- Footer -->
		@include('layouts.footer')	

</div>
</body>
</html>

	