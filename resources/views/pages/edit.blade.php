@extends('layouts.main')

@section('title', 'Edit comic')

@section('main-content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center my-5">
                    Modifica il comic
                </h2>
            </div>
            @include('pages.includes.form', [
                'routeName' => 'comic.update',
                'httpMethod' => 'PUT'
            ])
        </div>
    </div>
    
@endsection