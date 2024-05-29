<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="{{ route('home') }}" class="nav-item nav-link {{ Request::routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="nav-item nav-link {{ Request::routeIs('about') ? 'active' : '' }}">About</a>
                <a href="{{ route('services') }}" class="nav-item nav-link {{ Request::routeIs('services') ? 'active' : '' }}">Service</a>
                <a href="{{route('menu')}}" class="nav-item nav-link {{ Request::is('menu.html') ? 'active' : '' }}">Menu</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ Request::routeIs('team') || Request::routeIs('testimonial') ? 'active' : '' }}" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
{{--                        <a href="booking.html" class="dropdown-item {{ Request::is('booking.html') ? 'active' : '' }}">Booking</a>--}}
                        <a href="{{ route('team') }}" class="dropdown-item {{ Request::routeIs('team') ? 'active' : '' }}">Our Team</a>
                        <a href="{{ route('testimonial') }}" class="dropdown-item {{ Request::routeIs('testimonial') ? 'active' : '' }}">Testimonial</a>
                    </div>
                </div>
                <a href="{{ route('contact') }}" class="nav-item nav-link {{ Request::routeIs('contact') ? 'active' : '' }}">Contact</a>

            </div>
            <a href="" class="btn btn-primary py-2 px-4">Book A Table</a>
        </div>
    </nav>


</div>
