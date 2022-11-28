@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="row g-4 mb-4">
            @foreach ($sponsor->offers as $offer)
                <div class="col-6">
                    <p><strong>{{ $offer->name }}</strong></p>
                    <p>Brugt {{ \App\Models\UsedOffer::where('offer_id', $offer->id)->count() }} gange i alt</p>
                    @foreach ($departments as $department)
                        <p>Brugt
                            {{ DB::table('used_offers')->join('users', 'used_offers.user_id', '=', 'users.id')->join('department_user', 'users.id', '=', 'department_user.user_id')->join('departments', 'departments.id', '=', 'department_user.department_id')->where('used_offers.offer_id', '=', $offer->id)->where('department_user.department_id', '=', $department->id)->count() }}
                            gange hos
                            {{ $department->name }}</p>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
