@extends('layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        Et nyt verfikationslink er blevet sendt til din e-mail adresse.
                    </div>
                @endif

                Tjek venligst din e-mail for et verifikationslink, før du fortsætter.
                Hvis du ikke har modtaget en e-mail
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit"
                        class="btn btn-link p-0 m-0 align-baseline">{{ __('så klik her for at modtage en ny') }}</button>.
                </form>
            </div>
        </div>
    </div>
@endsection
