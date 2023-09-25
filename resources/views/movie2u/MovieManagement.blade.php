<script>
    function confirmDelete(movie_id) {
        if (confirm('Are you sure you want to delete this movie?')) {
            window.location.href = '/moviemanagement/delete/' + movie_id;
        }
    }
</script>
@extends('layouts.navbar')
@section('content')
<div class="container-fluid">
    <div class="row">

    </div>
    <h2 class="h2_top10 mt-4">Recommend for Movies 2 U this week</h2>
    <div class="row">
        @foreach ($movie as $m)
                <div class="col-3">
                    <div class="card mt-5" style="width: auto">
                        <a href="/moviedetail/{{ $m->movie_id }}">
                            <img class="card-img-top" src="{{ asset('Materials/Movies/' . $m->movie_id . '.png') }}" alt="Movie poster" width="300px" height="450px"/>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title  d-flex justify-content-between align-items-center">
                                {{ $m->movie_name }}
                                <i class="bi bi-star-fill text-warning">{{ $m->movie_score }}</i>
                            </h5>
                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <a href="{{ url('/movie/edit/'.$m->movie_id) }}" class="btn btn-warning" style="width: 48%;">Edit</a>
                                <a href="/moviemanagement/delete/{{ $m->movie_id }}" class="btn btn-danger" style="width: 48%;" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</div>
@endsection