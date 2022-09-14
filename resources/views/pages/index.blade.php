@extends('layouts.main')

@section('title', '| All comics')

@section('main-content')
    <main>
        <div class="container">
            <div class="row">
                @forelse ($comics as $comic)
                    <div class="card col-3">
                        <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title . '\'s thumbnail' }}">
                        <div class="card-body">
                            <ul>
                                <li class="card-text">
                                    <h6>
                                        Title
                                    </h6>
                                    <a href="{{ route('comic.show', $comic->slug) }}">{{ $comic->title }}</a>
                                </li>
                                <li class="card-text">
                                    {{ $comic->series }}
                                </li>
                                <li class="card-text">
                                    {{ $comic->type }}
                                </li>
                                <li class="card-text">
                                    {{ $comic->price }}
                                </li>
                                <li class="card-text">
                                    {{ $comic->description }}
                                </li>
                            </ul>
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
