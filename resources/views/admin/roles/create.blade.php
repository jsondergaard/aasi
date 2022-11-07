@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Opret rolle</h1>
        </div>
        <form action="{{ route('admin.roles.create') }}" method="POST">
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

            <div class="row mb-3">
                @foreach (\Spatie\Permission\Models\Permission::all() as $permission)
                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" name="permissions[{{ $permission->name }}]" type="checkbox"
                                    id="{{ $permission->name }}" @if (old('permissions[{$permission}]')) checked @endif>
                                <label class="form-check-label" for="{{ $permission->name }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Gem</button>
        </form>
    </div>
@endsection
