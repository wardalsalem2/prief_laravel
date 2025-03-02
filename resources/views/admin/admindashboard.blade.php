<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم المسؤول</title>
    <link rel="stylesheet" href="path/to/your/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/your/css/fontawesome.min.css">
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="{{ url('/') }}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link active">لوحة التحكم</a>
                                <a href="{{ route('admin.users.index') }}" class="nav-item nav-link">إدارة المستخدمين</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->

        <div class="container mt-4">
            <h2 class="mb-4">لوحة تحكم المسؤول</h2>

            <div class="row">
                <!-- إدارة المستخدمين -->
                <div class="col-md-4">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary w-100 p-3">
                        <i class="fas fa-users"></i> إدارة المستخدمين
                    </a>
                </div>
            </div>

            <div class="row mt-3">
                <!-- Footer Start -->
                <footer class="bg-dark text-white text-center py-4">
                    <div class="container">
                        <p class="mb-0">جميع الحقوق محفوظة &copy; 2025 <a href="#" class="text-primary">Hotelier</a></p>
                    </div>
                </footer>
                <!-- Footer End -->
            </div>
        </div>
    </div>

    <script src="path/to/your/js/bootstrap.bundle.min.js"></script>
</body>
</html>
