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
                <label for="departments">Afdelinger</label>
                <select name="departments[]" class="form-control" multiple>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" @if (is_array(old('department')) && in_array($department->id, old('departments'))) selected @endif>
                            {{ $department->name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('departments'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('departments') }}</strong>
                    </span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-4">Opret</button>
        </form>
    </div>
@endsection
