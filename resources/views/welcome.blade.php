<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Students POC</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/assets/favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
</head>
<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="#!">LOGO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

{{--                <li class="nav-item"><a class="nav-link" href="#!">Marc Jacobs</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link" href="#!">Login</a></li>--}}
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item"><a href="#" class="nav-link">{{ \Illuminate\Support\Facades\Auth::user()->name ?? '' }}</a></li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log in</a></li>

                        @if (Route::has('register'))
{{--                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>--}}
                    @endif
                    @endauth
                @endif

            </ul>
        </div>
    </div>
</nav>
<!-- Page Content-->
{{--@include('student')--}}
@yield('content')
<!-- Footer-->
<footer class="py-5 bg-white">

</footer>

<!-- rating.js file -->
<script src="{{ asset('assets/js/addons/rating.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('assets/js/scripts.js') }}"></script>

</body>
</html>
