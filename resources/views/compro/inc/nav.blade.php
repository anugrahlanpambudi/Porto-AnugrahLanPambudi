 <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ Route('home.index') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>eLEARNING</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('home.index') }}" class="nav-item nav-link {{ Route::is('home.index') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about.index') }}" class="nav-item nav-link {{ Route::is('about.index') ? 'active' : '' }}">About</a>
                <a href="{{ route('courses.index') }}" class="nav-item nav-link {{ Route::is('courses.index') ? 'active' : '' }}">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ Route::is('testimonial.index') || Route::is('team.index') ? 'active' :  ''}}" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{ route('team.index') }}" class="dropdown-item">Our Team</a>
                        <a href="{{ route('testimonial.index') }}" class="dropdown-item">Testimonial</a>

                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="{{ route('contact.index') }}" class="nav-item nav-link">Contact</a>
            </div>
            <a href="{{ route('login.index') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login Now<i
                    class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
