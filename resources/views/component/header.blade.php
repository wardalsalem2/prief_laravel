<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="{{ route('user.index') }}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 text-primary text-uppercase">Chalet</h1>
            </a>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="{{ route('user.index') }}" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ route('user.index') }}" class="nav-item nav-link">Home</a>
                        <a href="{{ url('index#about') }}" class="nav-item nav-link">About</a>
                        <a href="{{ url('index#Service') }}" class="nav-item nav-link">Services</a>
                        <a href="{{ url('index#chalete') }}" class="nav-item nav-link">Chalets</a>
                        <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                    </div>

                    <div class="navbar-nav ms-auto">
                        @if(session('user_name'))
                            <span class="nav-item nav-link text-white">مرحبًا، {{ session('user_name') }} ({{ session('user_role') }})</span>
                            <a href="{{ route('logout') }}" class="nav-item nav-link text-danger">Logout</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-item nav-link text-primary">Login</a>
                            <a href="{{ route('register') }}" class="nav-item nav-link text-success">Register</a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
