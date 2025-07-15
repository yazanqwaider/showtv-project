<div class="p-3 position-sticky" style="background: #ededed;">
    <ul class="d-flex list-unstyled gap-3 align-items-center">
        <li>
            <a href="{{ route('dashboard.home') }}">Home</a>
        </li>

        <li>
            <form action="" method="get">
                @csrf

                <input type="search" name="search" class="form-control" placeholder="Search ...">
            </form>
        </li>

        <li class="ms-auto">
            <a href="{{ route('auth.logout') }}">Logout</a>
        </li>
    </ul>
</div>
