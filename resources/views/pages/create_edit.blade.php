{{-- non più usata, avevo unito sia create che edit nella stessa pagina! --}}

<div class="col-6 mt-5 m-auto">

    {{-- upper validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- condition for create or edit --}}
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
            <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" 
            id="title" value="{{ $comic->title ?? '' }}" required> 
            <div class="form-text">Insert comic's title</div>

            @error('title')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="series" class="form-label">Series</label>
            <input name="series" type="text" class="form-control" 
            id="series"value="{{ $comic->series ?? '' }}">
            <div class="form-text">Insert comic's series</div>
        </div>


        <div class="mb-3">
            <label for="thumb" class="form-label">Thumb</label>
            <input name="thumb" type="text" class="form-control @error('thumb') is-invalid @enderror" 
            id="thumb"  value="{{ $comic->thumb ?? '' }}" required>
            <div class="form-text">Insert comic's thumb</div>

            @error('thumb')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>

            {{-- these conditions was for test porpouse but made no sense, to made it work
                without conditions, had to add $types get in controller edit --}}
            {{-- @if (request()->routeIs('comic.create')) --}}
                
                <select name="type" class="@error('type') is-invalid @enderror">
                    @foreach ($types as $type)
                        <option value="{{ $type->type_name }}">{{ $type->type_name }}</option>           
                    @endforeach
                </select>
            
            {{-- @elseif (request()->routeIs('comic.edit'))

                <input name="type" type="text" class="form-control" id="type"
                value="{{ $comic->type ?? '' }}" required>

            @endif --}}
            <div class="form-text">Insert comic's type</div>
            @error('type')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" 
            id="price" value="{{ $comic->price ?? '' }}" required>
            <div class="form-text">Insert comic's price</div>

            @error('price')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Sale date: </label>
            <input type="date" name="sale_date" class="@error('sale_date') is-invalid @enderror"
             id="date" value="{{ $comic->sale_date ?? '' }}" required>
            <div class="form-text">Insert comic's date</div>
            @error('sale_date')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
             id="description" cols="50" rows="10" required>
                {{ $comic->description ?? '' }}
            </textarea>
            <div class="form-text">Insert comic's description</div>
            @error('description')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg mt-2 mb-5">
                {{ request()->routeIs('comic.create') ? "Save" : "Edit" }}
            </button>
        </div>
    </form>
</div>