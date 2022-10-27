@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <form action="{{ route('admin.roles.update', $role) }}" method="POST">
            @csrf
            @method('PATCH')

            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Navn</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}"
                            required autofocus>

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
                        <input class="btn-check form-check-input" name="permissions[{{ $permission->name }}]"
                            type="checkbox" id="{{ $permission->name }}" @if ($role->hasPermissionTo($permission->name)) checked @endif>
                        <label class="btn btn-outline-success" for="{{ $permission->name }}">
                            {{ ucwords($permission->name) }}
                        </label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Gem</button>
        </form>
    </div>
@endsection
