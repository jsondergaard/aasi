<div class="container">
    <div class="carousel"
        data-flickity='{ "freeScroll": true, "wrapAround": true, "prevNextButtons": false, "pageDots": false, "autoPlay": true}'>
        @foreach ($sponsors as $sponsor)
            <div class="carousel-cell sponsor-cell" style="background-image: url('{{ $sponsor->imagePath }}')"></div>
        @endforeach
    </div>
</div>
