@extends('layouts.main')

@section('title', '| All comics')

@section('main-content')
    <main>
        <div class="container">
            <div class="row">
                @if (session('delete'))
                    <div class="alert alert-danger">
                        {{ session('delete') }} è stata eliminata con successo.
                    </div>
                @endif
            
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Series</th>
                        <th scope="col">Type</th>
                        <th scope="col">Sale date</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    @foreach ($comics as $comic)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $comic->id }}</th>
                            <td>
                                <a class="btn btn-primary" href="{{ route('comic.edit', $comic->slug) }}">Edit</a>
                            </td>
                            <td><a href="{{ route('comic.show', $comic->slug) }}">{{ $comic->title }}</a></td>
                            <td>{{ $comic->price }} - $</td>
                            <td>{{ $comic->series }}</td>
                            <td> {{  $comic->type }}</td>
                            <td>{{ $comic->sale_date }}</td>
                            <td>
                                <form action="{{ route('comic.destroy', $comic->slug) }}" method="POST"
                                    data-comic-name="{{ $comic->title }}">
                                    @method('DELETE')
                                    @csrf

                                    <input type="submit" value="Delete" class="btn btn-danger delete-action">

                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody> 
            </table>
            </div>
        </div>
    </main>
    
@endsection

@section('foot-script')
    <script>
        const deleteForm =  document.querySelectorAll('.delete-action');
        console.log(deleteForm);

        deleteForm.forEach( delButton => {
            console.log(delButton);
            
            delButton.addEventListener('submit', function(event){
                event.preventDefault();
                
                console.warn(delButton);

                const name = this.getAttribute('data-comic-name');

                const result = window.confirm(`Sei sicuro di voler rimuovere ${name}?`);    
                if(result) this.submit();
            })
            
        });
    </script>
@endsection
