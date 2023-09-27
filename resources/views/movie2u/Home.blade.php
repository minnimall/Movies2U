<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
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
        @import url( {{asset('css/home_style.css')}} );
    </style>
</head>
<body>
    <div class="navbar">
        <div class="container">
        <a href="/dashboard"><h1>Movie2U</h1></a>
            <form class="d-flex" role="search">
                <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
                <div class="btn-group">
                    <button class="btn btn-outline-danger" type="button">
                        <i class="bi bi-person-circle" style="font-size: 1.2rem;"></i>
                    </button>
                    <button type="button" class="btn btn-outline-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/user/profile">Setting</a></li> <!-- ลิ้งค์ไปหน้า profile -->
                        <li><a class="dropdown-item" href="/category">Category</a></li> <!-- ลิ้งค์ไปหน้าหมวดหมู่หนัง -->
                        <li><a class="dropdown-item" href="/MyWatchlist">Watchlist</a></li><hr> <!-- ลิ้งค์ไปหน้า watchlist -->
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Log Out</a></li> <!-- ออกจากระบบ -->
                    </ul>
                </div>
            </form>
        </div>
    </div>
   
    <div class="container"> 
        <div id="carouselExampleIndicators" class="carousel slide mt-5">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button> <!-- สไลด์ที่ 1 -->
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button> <!-- สไลด์ที่ 2 -->
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> <!-- สไลด์ที่ 3 -->
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button> <!-- สไลด์ที่ 4 -->
            </div>
            <div class="carousel-inner">
                <!-- รูปที่ 1 -->
                <div class="carousel-item active">
                    <img src="{{ asset('./img/1.png') }}" class="d-block w-100" alt="Avatar">
                </div>
                <!-- รูปที่ 2 -->
                <div class="carousel-item">
                    <img src="{{ asset('./img/2.png') }}" class="d-block w-100" alt="Inception">
                </div>
                <!-- รูปที่ 3 -->
                <div class="carousel-item">
                    <img src="{{ asset('./img/5.png') }}" class="d-block w-100" alt="spiderman">
                </div>
                <!-- รูปที่ 4 -->
                <div class="carousel-item">
                    <img src="{{ asset('./img/6.png') }}" class="d-block w-100" alt="spiderman">
                </div>
            </div>
            <!-- ปุ่มกำหนดไปรูปก่อนหน้า -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <!-- ปุ่มกำหนดไปรูปถัดไป -->
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- topic Recommend for Movies 2 U this week -->
        <div class="top10 mt-5">
            <h2 class="h2_top10">Recommend for Movies 2 U this week</h2>
            <div class="row">
                @foreach ($movie as $m)
                <div class="col-3">
                    <div class="card mt-5" style="width: auto">
                        <a href="/moviedetail/{{ $m->movie_id }}">
                            <img class="card-img-top" src="{{ asset('Materials/Movies/' . $m->movie_id . '.png') }}" alt="Movie poster" width="300px" height="450px"/>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title  d-flex justify-content-between align-items-center">
                                <b>{{ $m->movie_name }}</b>
                                <i class="bi bi-star-fill text-warning"><b class="text-black"> {{ $m->movie_score }} </b></i>
                            </h5>
                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <a href="{{ url('/moviedetail/'.$m->movie_id) }}" class="btn btn-warning" style="width: 48%;">Detail</a>
                                <a href="/addwatchlist/{{ $m->movie_id}}" class="btn btn-dark" style="width: 48%;"><i class="bi bi-plus-lg"></i> Watchlist</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- topic Category Movies -->
        <p class="title_category_Movies mt-5">Category Movies</p>
        <div class="top10 mt-4">
            <h2 class="category">Action</h2>
            <div class="row">
            @foreach ($action as $act)
                @foreach ($movie as $m)
                @if($act->type_id == $m->movie_type_id)
                <div class="col-3">
                    <div class="card mt-4" style="width: auto">
                        <a href="/moviedetail/{{ $m->movie_id }}">
                            <img class="card-img-top" src="{{ asset('Materials/Movies/' . $m->movie_id . '.png') }}" alt="Movie poster" width="300px" height="450px"/>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title  d-flex justify-content-between align-items-center">
                                <b>{{ $m->movie_name }}</b>
                                <i class="bi bi-star-fill text-warning"><b class="text-black"> {{ $m->movie_score }} </b></i>
                            </h5>
                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <a href="{{ url('/moviedetail/'.$m->movie_id) }}" class="btn btn-warning" style="width: 48%;">Detail</a>
                                <a href="/addwatchlist/{{ $m->movie_id}}" class="btn btn-dark" style="width: 48%;"><i class="bi bi-plus-lg"></i> Watchlist</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            @endforeach
           </div>
        </div>

        <div class="top10 mt-5">
            <h2 class="category">Comedy</h2>
            <div class="row">
            @foreach ($comedy as $cm)
                @foreach ($movie as $m)
                @if($cm->type_id == $m->movie_type_id)
                <div class="col-3">
                    <div class="card mt-4" style="width: auto">
                        <a href="/moviedetail/{{ $m->movie_id }}">
                            <img class="card-img-top" src="{{ asset('Materials/Movies/' . $m->movie_id . '.png') }}" alt="Movie poster" width="300px" height="450px"/>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title  d-flex justify-content-between align-items-center">
                                <b>{{ $m->movie_name }}</b>
                                <i class="bi bi-star-fill text-warning"><b class="text-black"> {{ $m->movie_score }} </b></i>
                            </h5>
                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <a href="{{ url('/moviedetail/'.$m->movie_id) }}" class="btn btn-warning" style="width: 48%;">Detail</a>
                                <a href="/addwatchlist/{{ $m->movie_id}}" class="btn btn-dark" style="width: 48%;"><i class="bi bi-plus-lg"></i> Watchlist</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            @endforeach
           </div>
        </div>
        <div class="d-grid gap-2 col-4 mx-auto mt-5">
            <a href="/category"><button class="btn btn-warning d-grid gap-2 col-4 mx-auto " type="button">More . . .</button></a>
        </div>
        <hr class="mt-5">
    </div>

    <!-- Footer -->
    <div class="container">
        <footer>
            <div class="footer_social">
                <ul>
                    <li class="icon"><a href=""><i class="bi bi-facebook text-primary" style="font-size: 1.5rem;"></i></a></li>
                    <li class="icon"><a href=""><i class="bi bi-twitter text-primary" style="font-size: 1.5rem;"></i></a></li>
                    <li class="icon"><a href=""><i class="bi bi-instagram text-danger" style="font-size: 1.5rem;"></i></a></li>
                    <li class="icon"><a href=""><i class="bi bi-github" style="font-size: 1.5rem;"></i></a></li>
                </ul>
                <p>@ 2023 by Movie2U</p>
            </div>
            
        </footer>
    </div>
</body>

</html>