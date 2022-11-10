@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Opret afdeling</h1>
        </div>
        <form action="{{ route('admin.departments.store') }}" method="POST">
            @csrf

            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Navn</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Opret</button>
        </form>
    </div>
@endsection
