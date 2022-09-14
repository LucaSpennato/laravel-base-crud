@extends('layouts.main')

@section('title', '| All comics')

@section('main-content')
    <main>
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Series</th>
                        <th scope="col">Sale date</th>
                    </tr>
                    </thead>
                    @foreach ($comics as $comic)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $comic->id }}</th>
                            <td><a href="{{ route('comic.show', $comic->slug) }}">{{ $comic->title }}</a></td>
                            <td>{{ $comic->price }} - $</td>
                            <td>{{ $comic->series }}</td>
                            <td>{{ $comic->sale_date }}</td>
                        </tr>
                        @endforeach
                    </tbody> 
            </table>
            </div>
        </div>
    </main>
    
@endsection
