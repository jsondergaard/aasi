<style>
    .carousel {
        background: #EEE;
    }

    .carousel-cell {
        width: 25%;
        height: 200px;
        margin-right: 10px;
        background: #8C8;
        border-radius: 5px;
        counter-increment: carousel-cell;
    }

    /* cell number */
    .carousel-cell:before {
        display: block;
        text-align: center;
        content: counter(carousel-cell);
        line-height: 200px;
        font-size: 80px;
        color: white;
    }
</style>

<div class="container">
    <div class="carousel"
        data-flickity='{ "freeScroll": true, "wrapAround": true, "contain": true, "prevNextButtons": false, "pageDots": false, "autoPlay": true}'>
        <div class="carousel-cell"><img src="https://via.placeholder.com/150" /></div>
        <div class="carousel-cell"><img src="https://via.placeholder.com/150" /></div>
        <div class="carousel-cell"><img src="https://via.placeholder.com/150" /></div>
        <div class="carousel-cell"><img src="https://via.placeholder.com/150" /></div>
        <div class="carousel-cell"><img src="https://via.placeholder.com/150" /></div>
        <div class="carousel-cell"><img src="https://via.placeholder.com/150" /></div>
    </div>
</div>
