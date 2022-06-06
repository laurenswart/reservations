<nav id="nav">
    <ul>
        <li><a href="{{route('welcome')}}">Home</a></li>
        <li><a href="{{ route('shows_index')}}">Shows</a></li>
        <li><a href="{{ route('artists_index')}}">Artists</a></li>
        <li><a href="{{ route('locations_index')}}">Locations</a></li>
        @guest
        <li>
            <a href="#">My Account</a>
            <ul>
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('login') }}">Log In</a></li>
            </ul>
        </li>
        @endguest
        @auth
        <li>
            <a href="#">My Account</a>
            <ul>
                <li><a href="{{ route('user_account') }}">My Profile</a></li>
                <li><a href="{{ route('reservations_forUser') }}">My Reservations</a></li>
                <li><!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">{{ __('Log Out') }}</a>
                    </form>
                </li>
            </ul>
        </li>
        @endauth       
    </ul>
</nav>

