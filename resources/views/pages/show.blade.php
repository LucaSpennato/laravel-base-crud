@extends('layouts.main')

@section('title', '| Comic: ' . $comic->title)

@section('main-content')
<main>
    <div class="container">
        <div class="row">
            <div class="card m-auto mt-5" style="width: 18rem;">
                <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title . '\'s thumbnail' }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $comic->title }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{ $comic->series }}</h6>
                  <p class="card-text">{{ $comic->description }}</p>
                  <p class="card-text">{{ $comic->price }}</p>
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
              </div>
        </div>
    </div>
</main>
@endsection