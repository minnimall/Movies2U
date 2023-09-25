<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies2U</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">

    <!--icons import-->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        @import url( {{asset('css/web.css')}} );
    </style>
</head>
<body>
<div class="navbar">
        <div class="container">
        <a href="/dashboard"><h1>Movie2U</h1></a>
            <form class="d-flex" role="search">
                <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
                <div class="btn-group">
                    <a href="/home">
                        <button class="btn btn-outline-danger" type="button">
                            <i class="bi bi-person-circle" style="font-size: 1.2rem;"></i>
                        </button>
                    </a>
                    <button type="button" class="btn btn-outline-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/user/profile">Setting</a></li> <!-- ลิ้งค์ไปหน้า profile -->
                        <li><a class="dropdown-item" href="/category">Category</a></li> <!-- ลิ้งค์ไปหน้าหมวดหมู่หนัง -->
                        <li><a class="dropdown-item" href="#">Watchlist</a></li><hr> <!-- ลิ้งค์ไปหน้า watchlist -->
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Log Out</a></li> <!-- ออกจากระบบ -->
                    </ul>
                </div>
            </form>
        </div>
    </div>
    <div class="container mt-3">
        @yield('content')
    </div>
</body>
</html>