<div class="container mt-4">
    <div class="row">
        @foreach (\App\Models\Sponsor::all() as $sponsor)
            <div class="col-md-6 g-3">
                <div class="row">
                    <div class="col-md-4">
                        @if ($sponsor->link)
                            <a href="{{ $sponsor->link }}" target="_blank">
                                <img src="{{ $sponsor->imagePath }}" alt="{{ $sponsor->name }}" class="w-100" />
                            </a>
                        @else
                            <img src="{{ $sponsor->imagePath }}" alt="{{ $sponsor->name }}" class="w-100" />
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h3>{{ $sponsor->name }}</h3>
                        <p>{{ $sponsor->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
