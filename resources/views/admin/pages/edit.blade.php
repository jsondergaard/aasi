@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Rediger side</h1>
            <div class="mb-2 mb-md-0">
                <div class="btn-group me-2">
                    @can('delete page')
                        @if ($page->children->count() > 0)
                            <button class="btn btn-outline-danger">Slet</button>
                        @else
                            <form action="{{ route('admin.pages.destroy', $page->slug) }}" method="POST"
                                onSubmit="return confirm('Er du sikker på du vil slette siden?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Slet</button>
                            </form>
                        @endif
                    @endcan
                </div>
            </div>
        </div>
        <form action="{{ route('admin.pages.update', $page) }}" method="POST">
            @csrf
            @method('PATCH')

            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach

            <div class="row mb-3">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="name">Navn</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $page->name) }}"
                            required autofocus>

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
                        @if ($page->children->count() == 0)
                            <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                                <option value="0">Ingen</option>
                                @foreach ($availablePages as $availablePage)
                                    <option value="{{ $availablePage->id }}"
                                        @if (old('parent_id', $page->parent_id) == $availablePage->id) selected @endif
                                        @if ($availablePage->parent_id != null) disabled @endif>
                                        {{ $availablePage->name }}</option>
                                @endforeach
                            </select>
                        @else
                            <p class="text-muted">
                                <input class="form-control" value="Er selv forældre" readonly>
                            </p>
                        @endif

                        @if ($errors->has('parent_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('parent_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="is_page">Dropdown</label>
                        @if ($page->children->count() > 0)
                            <div class="form-check">
                                <input class="form-check-input" name="is_page" type="checkbox" id="flexCheckChecked"
                                    @if ($page->is_page == 1) checked @endif>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Vis i dropdown
                                </label>
                            </div>

                            @if ($errors->has('is_page'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('is_page') }}</strong>
                                </span>
                            @endif
                        @else
                            <div class="form-check">
                                <input class="form-check-input" name="is_page" type="checkbox" id="flexCheckChecked"
                                    disabled>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Vis i dropdown
                                </label>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="order_id">Orden ID</label>
                        <input type="number" id="order_id" name="order_id"
                            class="form-control @error('order_id') is-invalid @enderror"
                            value="{{ old('order_id', $page->order_id) }}" min="1" max="10" autofocus>

                        @if ($errors->has('order_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('order_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="content" class="form-label">Brødtekst (markdown)</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="10" name="content">{{ old('content', $page->content) }}</textarea>
                </div>
            </div>

            <div class="d-flex justify-content-between mb-4">
                <a href="#" class="btn btn-outline-primary" id="btnReset" onClick="resetTextarea()">Nulstil til
                    standard</a>

                <button type="submit" class="btn btn-primary">Gem</button>
            </div>

            <pre>Tilgængelige tags:</pre>
            <pre>Print sponsorlisten ud: &lt;x-sponsors /></pre>
            <pre>Print sponsorkarusellen ud: &lt;x-sponsor /></pre>
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
            element: document.getElementById("content")
        });
    </script>

    <script>
        function resetTextarea() {
            var name = document.getElementById("name").value;

            if (name === "Hjem") {
                simplemde.value(
                    '<div class="position-relative overflow-hidden p-3 p-md-5 text-center text-white shadow-lg"' +
                    'style="background: linear-gradient(27deg, rgba(19, 41, 59, 0.3) 0%, rgba(18, 54, 37, 0.5) 64%, rgba(30, 14, 43, 0.625) 100%), center / cover no-repeat url("https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2493&q=80");">\n' +
                    '<div class="col-md-5 p-lg-5 mx-auto my-5">\n' +
                    '<h1 class="display-4 font-weight-bold text-white text-uppercase">AASI</h1>\n\n' +
                    '<p class="lead font-weight-normal">Brødtekst</p>\n\n' +
                    '</div>\n' +
                    '</div>\n\n <div class="container">\n' +
                    '<div class="px-4 py-5 my-5 text-center">\n' +
                    '<h1 class="display-5 fw-bold">Aalborg Studenternes Idrætsforening</h1>\n\n' +
                    '<div class="col-lg-6 mx-auto">\n' +
                    '<!-- Hey -->\n' +
                    '<p class="lead mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ratione consectetur' +
                    'deleniti quae. Sunt consequuntur ipsam, nulla ipsa consectetur tempore suscipit molestiae' +
                    'accusantium' +
                    'voluptatem voluptatum expedita quibusdam, laborum soluta odio.</p>\n' +
                    '<div class="d-grid gap-2 d-sm-flex justify-content-sm-center">\n' +
                    '<button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>\n' +
                    '<button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>\n' +
                    '</div>\n' +
                    '</div>\n' +
                    '</div>\n' +
                    '</div>\n');
            } else {
                simplemde.value('<div class="container mt-4">\n  <h1>Overskriften</h1>\n<div>');
            }
        }
    </script>
@endpush
