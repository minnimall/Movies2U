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
        @import url( {{asset('css/web.css')}} );
    </style>
</head>
<body>
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
    <div class="container mt-3">
        @yield('footer')
    </div>
</body>
</html>