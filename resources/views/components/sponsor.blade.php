<div class="container">
    <div class="carousel"
        data-flickity='{ "freeScroll": true, "wrapAround": true, "prevNextButtons": false, "pageDots": false, "autoPlay": true}'>
        @foreach ($sponsors as $sponsor)
            <div class="carousel-cell" style="background-image: url('https://via.placeholder.com/150')"></div>
        @endforeach
    </div>
</div>
