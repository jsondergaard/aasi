@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Opret ny bruger</h1>
        </div>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach

            <div class="row mb-3">
                <div class="col-md-4">
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

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gender">Køn</label>
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                            <option value="male">Mand</option>
                            <option value="female">Kvinde</option>
                        </select>

                        @if ($errors->has('gender'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>


            <div class="col-4">
                <label for="categories">Category</label>
                <select name="categories[]" class="form-control" multiple>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (is_array(old('categories')) && in_array($category->id, old('categories'))) selected @endif>
                            {{ $category->name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('categories'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('categories') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="departments">Tilknytning</label>
                        <select name="departments[]" class="form-control">
                            <option>Ingen</option>
                            @foreach (\App\Models\Department::all() as $depmartent)
                                <option value="{{ $department->id }}" @if (is_array(old('departments')) && in_array($department->id, old('departments'))) selected @endif>
                                    {{ $department->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('departments'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('departments') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Opret</button>
        </form>
    </div>
@endsection
