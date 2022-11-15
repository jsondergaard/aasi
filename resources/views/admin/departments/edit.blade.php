@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Rediger afdeling</h1>
            <div class="mb-2 mb-md-0">
                <div class="btn-group me-2">
                    @can('delete department')
                        <form action="{{ route('admin.departments.destroy', $department) }}" method="POST"
                            onSubmit="return confirm('Er du sikker på du vil slette afdelingen?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Slet</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
        <form action="{{ route('admin.departments.update', $department) }}" method="POST">
            @csrf
            @method('PATCH')

            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Navn</label>
                        <input type="text" name="name" class="form-control"
                            value="{{ old('name', $department->name) }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Gem</button>
        </form>
    </div>
@endsection
