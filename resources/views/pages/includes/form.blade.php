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

    {{-- il form riceve i dati dai props del rispettivo blade!
        Per quanto il create non ne abbia bisogno, l'update necessita dello slug --}}
    <form method="POST" action="{{ route($routeName, $comic->slug ?? '') }}">
        @csrf
        @method($httpMethod)

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                value="{{ $comic->title ?? '' }}" required>
            <div class="form-text">Insert comic's title</div>

            @error('title')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="series" class="form-label">Series</label>
            <input name="series" type="text" class="form-control" id="series"value="{{ $comic->series ?? '' }}">
            <div class="form-text">Insert comic's series</div>
        </div>


        <div class="mb-3">
            <label for="thumb" class="form-label">Thumb</label>
            <input name="thumb" type="text" class="form-control @error('thumb') is-invalid @enderror"
                id="thumb" value="{{ $comic->thumb ?? '' }}" required>
            <div class="form-text">Insert comic's thumb</div>

            @error('thumb')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" class="@error('type') is-invalid @enderror">
                @foreach ($types as $type)
                    <option value="{{ $type->type_name }}">{{ $type->type_name }}</option>
                @endforeach
            </select>

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
            <input type="date" name="sale_date" class="@error('sale_date') is-invalid @enderror" id="date"
                value="{{ $comic->sale_date ?? '' }}" required>
            <div class="form-text">Insert comic's date</div>
            @error('sale_date')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                cols="50" rows="10" required>
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
                {{ request()->routeIs('comic.create') ? 'Save' : 'Edit' }}
            </button>
        </div>
    </form>
</div>
