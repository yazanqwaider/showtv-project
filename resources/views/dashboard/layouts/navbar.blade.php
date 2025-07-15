<div class="p-3 position-sticky" style="background: #ededed;">
    <ul class="d-flex list-unstyled gap-3 align-items-center">
        <li>
            <a href="{{ route('dashboard.home') }}" class="navbar-link home-link">Home</a>
        </li>

        <li>
            <a href="{{ route('dashboard.users.index') }}" class="navbar-link">Users</a>
        </li>

        <li>
            <a href="{{ route('dashboard.shows.index') }}" class="navbar-link">Shows</a>
        </li>

        <li>
            <a href="{{ route('dashboard.episodes.index') }}" class="navbar-link">Episodes</a>
        </li>

        <li>
            <form action="{{ route('search') }}" method="get">
                @csrf

                <input type="search" name="search" class="form-control" placeholder="Search ...">
            </form>
        </li>

        <li class="ms-auto">
            <a href="{{ route('auth.logout') }}" class="navbar-link bg-danger">Logout</a>
        </li>
    </ul>
</div>
