@extends('layouts.main')

@section('title', '| Comic: ' . $comic->title)

@section('main-content')
<main>
    <div class="container">
        <div class="row">
            @forelse ($comics as $comic)

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{ $comic->title }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{ $comic->series }}</h6>
                  <p class="card-text">{{ $comic->description }}</p>
                  <p class="card-text">{{ $comic->price }}</p>
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
              </div>
                
            @empty
                <h2>
                    Non ci sono comics.
                </h2>
            @endforelse
        </div>
    </div>
</main>
@endsection