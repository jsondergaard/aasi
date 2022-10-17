@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <form action="{{ route('admin.pages.store') }}" method="POST">
            @csrf

            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required
                            autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="parent_id">Forældre side</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">Ingen</option>
                            @foreach ($availablePages as $availablePage)
                                <option value="{{ $availablePage->id }}" @if (old('parent_id') == $availablePage->id) selected @endif
                                    @if ($availablePage->parent_id != null) disabled @endif>
                                    {{ $availablePage->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('parent_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('parent_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="is_page">Vis i dropdown</label>
                        <p class="text-muted">
                            <small>N/A når ingen børn.</small>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="markdown" class="form-label">Brødtekst (markdown)</label>
                    <textarea class="form-control" id="markdown" rows="10" name="markdown">{{ old('markdown') }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Opret</button>
        </form>
    </div>
@endsection

@push('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplemde/1.11.2/simplemde.min.css"
        integrity="sha512-lB03MbtC3LxImQ+BKnZIyvVHTQ8SSmQ15AhVh5U/+CCp4wKtZMvgLGXbZIjIBBbnKsmk3/6n2vcF8a9CtVVSfA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplemde/1.11.2/simplemde.min.js"
        integrity="sha512-ksSfTk6JIdsze75yZ8c+yDVLu09SNefa9IicxEE+HZvWo9kLPY1vrRlmucEMHQReWmEdKqusQWaDMpkTb3M2ug=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        var simplemde = new SimpleMDE({
            element: document.getElementById("markdown")
        });
    </script>
@endpush
