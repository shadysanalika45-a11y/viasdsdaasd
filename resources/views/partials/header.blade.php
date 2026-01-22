<header class="site-header">
    <div class="container">
        <a class="brand" href="{{ route('home') }}">{{ config('app.name', 'Vidoo') }}</a>
        <nav class="nav">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('pricing') }}">Pricing</a>
            <a href="{{ route('contact') }}">Contact</a>
            @auth
                <a href="{{ route('profile') }}">Profile</a>
                <form action="{{ route('logout') }}" method="post" class="inline">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login.form') }}">Login</a>
                <a href="{{ route('register.form') }}">Register</a>
            @endauth
        </nav>
    </div>
</header>
