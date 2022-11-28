@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="row g-4 mb-4">
            @foreach ($sponsors as $sponsor)
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-truncate"><a
                                    href="{{ route('admin.statistics.view', $sponsor) }}">{{ $sponsor->name }}</a>
                            </h4>
                            <h5 class="card-title">{{ \App\Models\Offer::where('sponsor_id', $sponsor->id)->count() }}
                                kuponer</h5>
                            <p class="card-text">
                                Brugt
                                {{ \App\Models\UsedOffer::where('sponsor_id', $sponsor->id)->count() }} gange
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
