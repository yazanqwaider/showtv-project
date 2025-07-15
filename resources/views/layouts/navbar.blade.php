<div class="p-3 position-sticky" style="background: #ededed;">
    <ul class="d-flex list-unstyled gap-3 align-items-center">
        <li>
            <a href="{{ route('home') }}" class="navbar-link home-link">Home</a>
        </li>

        <li>
            <a href="{{ route('random-shows') }}" class="navbar-link">Random Shows</a>
        </li>

        <li>
            <form action="{{ route('search') }}" method="get">
                @csrf

                <input type="search" name="search" class="form-control" placeholder="Search ..."
                    value="{{ request()->search }}">
            </form>
        </li>


        @auth
            <li class="ms-auto">
                <a href="{{ route('auth.logout') }}" class="navbar-link bg-danger">Logout</a>
            </li>
        @else
            <li class="ms-auto">
                <div>
                    <a href="{{ route('auth.show-login') }}" class="navbar-link bg-success">Login</a>

                    <a href="{{ route('auth.show-register') }}" class="navbar-link bg-secondary">Register</a>
                </div>
            </li>
        @endauth
    </ul>
</div>
