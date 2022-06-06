@extends('layouts.no-sidebar')

@section('content')
    <article id="main" class="special">
        <header>
            <p>
               Découvrez tous les artistes figurant dans nos spectacles
            </p>
        </header>
        <p>
            Commodo id natoque malesuada sollicitudin elit suscipit. Curae suspendisse mauris posuere accumsan massa
            posuere lacus convallis tellus interdum. Amet nullam fringilla nibh nulla convallis ut venenatis purus
            lobortis. Auctor etiam porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum
            consequat integer interdum integer purus sapien. Nibh eleifend nulla nascetur pharetra commodo mi augue
            interdum tellus. Ornare cursus augue feugiat sodales velit lorem. Semper elementum ullamcorper lacinia
            natoque aenean scelerisque vel lacinia mollis quam sodales congue.
        </p>
        <section>
            <header>
                <h3>Ultrices tempor sagittis nisl</h3>
            </header>
            <p>
                Nascetur volutpat nibh ullamcorper vivamus at purus. Cursus ultrices porttitor sollicitudin imperdiet
                at pretium tellus in euismod a integer sodales neque. Nibh quis dui quis mattis eget imperdiet venenatis
                feugiat. Neque primis ligula cum erat aenean tristique luctus risus ipsum praesent iaculis. Fermentum elit
                fringilla consequat dis arcu. Pellentesque mus tempor vitae pretium sodales porttitor lacus. Phasellus
                egestas odio nisl duis sociis purus faucibus morbi. Eget massa mus etiam sociis pharetra magna.
            </p>
            <p>
                Eleifend auctor turpis magnis sed porta nisl pretium. Aenean suspendisse nulla eget sed etiam parturient
                orci cursus nibh. Quisque eu nec neque felis laoreet diam morbi egestas. Dignissim cras rutrum consectetur
                ut penatibus fermentum nibh erat malesuada varius.
            </p>
        </section>
        
    </article>
   
           
        
    <div class="row mt-4">
        @foreach($artists as $artist)
        <article class="col-4 col-12-mobile special">
            <a href="{{ route('artists_show', $artist->id) }}" class="image featured avatar"><img src="{{ asset('images/avatar.png') }}" alt="" /></a>
            <header>
                <h3><a href="{{ route('artists_show', $artist->id) }}"><strong>{{ $artist->firstname }} {{ $artist->lastname }}</strong></a></h3>
            </header>
            <p>
               
            </p>
        </article>
        @endforeach
        
    </div>

@endsection
