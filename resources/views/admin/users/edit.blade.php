@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Rediger bruger</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    @can('delete user')
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                            onSubmit="return confirm('Er du sikker på du vil slette brugeren?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Slet</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PATCH')

            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Navn</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"
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
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}"
                            required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="gender">Køn</label>
                        <select name="gender" class="form-control">
                            <option value="male" @if (old('gender', $user->gender) == 'male') selected @endif>
                                Mand</option>
                            <option value="female" @if (old('gender', $user->gender) == 'female') selected @endif>
                                Kvinde</option>
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
                        <label for="role">Rolle</label>

                        <select name="role" class="form-control">
                            <option value="0">Ingen</option>
                            @foreach (\Spatie\Permission\Models\Role::all() as $role)
                                <option value="{{ $role->name }}"
                                    @if ($user->roles->count() > 0) @if (old('role', $user->roles->first()->name) == $role->name) selected @endif
                                    @endif>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('role'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                        @endif
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
            </div>

            <button type="submit" class="btn btn-primary">Gem</button>
        </form>
    </div>
@endsection
