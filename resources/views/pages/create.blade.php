@extends('layouts.main')

@section('title', 'Add comic')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-6 mt-5 m-auto">
                @if (request()->routeIs('comic.create'))
                    
                    <h2 class="text-center mb-5">
                        Aggiungi un nuovo comic
                    </h2>
                    <form method="POST" action="{{ route('comic.store') }}">

                @elseif (request()->routeIs('comic.edit'))
                    
                    <h2 class="text-center mb-5">
                        Modifica il comic
                    </h2>

                    <form method="POST" action="{{ route('comic.update', $comic->slug) }}">
                        @method('PUT')
                @endif
                
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" id="title" 
                        value="{{ $comic->title ?? '' }}" required>
                            
                        <div class="form-text">Insert comic's title</div>
                    </div>
                    <div class="mb-3">
                        <label for="series" class="form-label">Series</label>
                        <input name="series" type="text" class="form-control" id="series"
                            value="{{ $comic->series ?? '' }}">
                        <div class="form-text">Insert comic's series</div>
                    </div>
                    <div class="mb-3">
                        <label for="thumb" class="form-label">Thumb</label>
                        <input name="thumb" type="text" class="form-control" id="thumb"
                            value="{{ $comic->thumb ?? '' }}" required>
                        <div class="form-text">Insert comic's thumb</div>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input name="type" type="text" class="form-control" id="type"
                            value="{{ $comic->type ?? '' }}" required>
                        <div class="form-text">Insert comic's type</div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input name="price" type="text" class="form-control" id="price"
                            value="{{ $comic->price ?? '' }}" required>
                        <div class="form-text">Insert comic's price</div>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Sale date: </label>
                        <input type="date" name="sale_date" id="date" 
                         value="{{ $comic->sale_date ?? '' }}" required>
                        <div class="form-text">Insert comic's date</div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" cols="50" rows="10" required>
                            {{ $comic->description ?? '' }}
                        </textarea>
                        <div class="form-text">Insert comic's description</div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg mt-2 mb-5">
                            {{ request()->routeIs('comic.create') ? "Save" : "Edit" }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
