<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to Install Bootstrap 5 in Laravel 12 with Vite - ItStuffSolutiotions</title>
 
    {{-- Vite Assets --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
 
<body>
 
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
 
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
 
    {{-- Main Section --}}
    <div class="container my-5">
 
        {{-- Alerts --}}
        <div class="alert alert-success">MIRAiE ミライエ</div>

        {{-- Cards --}}
        <div class="row g-4">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">ようこそ</h5>
                        <p class="card-text">これはサンプルページです。</p>
                    </div>
                </div>
            </div>
        </div>
 
    </div>
 
    {{-- Footer --}}
    <footer class="bg-light py-3 border-top mt-5">
        <div class="container text-center">
            <small>© {{ date('Y') }} MIRAiE Corporation All rights reserved.</small>
        </div>
    </footer>
 
</body>
</html>