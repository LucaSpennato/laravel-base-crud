@extends('layouts.main')

@section('title', 'Add comic')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center my-5">
                    Aggiungi un nuovo comic
                </h2>
            </div>
            @include('pages.includes.form', [
                'httpMethod' => 'POST',
                'routeName' => 'comic.store'
            ])
        </div>
    </div>
@endsection
