    <div class="carousel my-5"
        data-flickity='{ "freeScroll": true, "wrapAround": true, "prevNextButtons": false, "pageDots": false, "autoPlay": true}'>
        @foreach (\App\Models\Sponsor::all() as $sponsor)
            <div class="carousel-cell sponsor-cell" style="background-image: url('{{ $sponsor->imagePath }}')"></div>
        @endforeach
    </div>
