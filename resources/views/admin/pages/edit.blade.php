@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <form action="{{ route('admin.pages.update', $page) }}" method="POST">
            @csrf
            @method('PATCH')

            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $page->name) }}"
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
                            <select name="parent_id" class="form-control">
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
                                <small>Kan ikke være barn til nogle sider da den selv er forældre.</small>
                            </p>
                        @endif

                        @if ($errors->has('parent_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('parent_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        @if ($page->children->count() > 0)
                            <label for="is_page">Vis i dropdown</label>
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
                            N/A når ingen børn
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="markdown" class="form-label">Brødtekst (markdown)</label>
                    <textarea class="form-control" id="markdown" rows="10" name="markdown">{{ old('markdown', $page->markdown) }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Gem</button>
        </form>
    </div>
@endsection
