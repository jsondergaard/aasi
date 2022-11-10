@extends('layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="row">
            {{-- <a href="{{ route('offers.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
            </a> --}}
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <img class="w-100" height="450" style="object-fit: cover;"
                        src="https://images.unsplash.com/photo-1539252554453-80ab65ce3586?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1287&q=80">
                </div>
                <div class="col-md-6 col-sm-12">
                    <h1>{{ $offer->name }}</h1>
                    <p>{{ $offer->description }}</p>
                    {{-- @if (auth()->user()->usedOffer($offer))
                        <p>Sidst brugt: {{ auth()->user()->usedOffer($offer)->toHuman() }}</p>
                    @endif --}}

                    <form action="{{ route('offers.activate', $offer) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-lg btn-primary mb-5">Aktiver din kupon</button>
                    </form>

                    <div class="swiper">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="260px"
                            height="45px">
                            <g id="dotted-line" class="dotted-line">
                                <circle cx="40" cy="22" r="3"></circle>
                                <circle cx="60" cy="22" r="3"></circle>
                                <circle cx="80" cy="22" r="3"></circle>
                                <circle cx="100" cy="22" r="3"></circle>
                                <circle cx="120" cy="22" r="3"></circle>
                                <circle cx="140" cy="22" r="3"></circle>
                                <circle cx="160" cy="22" r="3"></circle>
                                <circle cx="180" cy="22" r="3"></circle>
                                <circle cx="200" cy="22" r="3"></circle>
                                <circle cx="220" cy="22" r="3"></circle>
                            </g>
                            <path id="swipe-end" class="swipe-end"
                                d="M9.000,1.000 C13.418,1.000 17.000,4.582 17.000,9.000 C17.000,13.418 13.418,16.999 9.000,16.999 C4.582,16.999 1.000,13.418 1.000,9.000 C1.000,4.582 4.582,1.000 9.000,1.000 Z" />
                            <a id="swipe-btn" class="swipe-btn" xlink:href="http://example.com/link/">
                                <g>
                                    <path fill-rule="evenodd" fill="rgb(237, 112, 0)"
                                        d="M22.000,0.001 C34.150,0.001 44.000,9.850 44.000,22.000 C44.000,34.150 34.150,44.000 22.000,44.000 C9.850,44.000 0.000,34.150 0.000,22.000 C0.000,9.850 9.850,0.001 22.000,0.001 Z" />
                                    <path id="swipe-arrow" class="arrow" fill-rule="evenodd"
                                        d="M12.551,8.707 L5.256,1.412 C4.270,0.426 2.672,0.426 1.686,1.412 C0.701,2.398 0.701,3.996 1.686,4.981 L7.197,10.492 L1.686,16.003 C0.701,16.988 0.701,18.587 1.686,19.572 C2.672,20.558 4.270,20.558 5.256,19.572 L12.551,12.276 C13.537,11.292 13.537,9.693 12.551,8.707 Z" />
                                </g>
                            </a>
                        </svg>

                        <div class="unlock">
                            Din kupon er aktiveret
                        </div>

                        <div class="error">
                            Der er kraftedeme sket en fejl. Beklager.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
    <script>
        var swiperDragged = false,
            startX,
            endX = 0;

        function swipe() {
            var $swipe = $('.swiper'),
                $btn = $('.swipe-btn', $swipe);

            TweenLite.to('#swipe-arrow', 0, {
                x: 16,
                y: 11
            });
            TweenLite.to('#swipe-end', 0, {
                x: 235,
                y: 12
            });

            var tl = new TimelineMax({
                repeat: -1
            });
            tl.staggerFrom("#dotted-line circle", 0.7, {
                scale: 0.7,
                x: -2,
                y: .5,
                opacity: 0.7,
                delay: 0.1,
                ease: Power2.easeInOut,
                repeat: 1,
                yoyo: true
            }, 0.15);

            $btn.on('click touchend', function(e) {
                e.preventDefault();
            }).on('touchstart mousedown', function(e) {
                e.preventDefault();
                swiperDragged = true;
                startX = typeof e.pageX != 'undefined' ? e.pageX : e.originalEvent.touches[0].pageX;
                endX = 0;
            })

            $(document).on('touchmove mousemove', function(e) {
                if (swiperDragged) {
                    actualX = typeof e.pageX != 'undefined' ? e.pageX : e.originalEvent.touches[0].pageX;
                    endX = Math.max(0, Math.min(215, actualX - startX));
                    TweenLite.to('#swipe-btn', 0, {
                        x: endX
                    });
                }
            }).on('touchend mouseup', function(e) {
                if (swiperDragged) {
                    swiperDragged = false;
                    if (endX < 200) {
                        TweenLite.to('#swipe-btn', .5, {
                            x: 0
                        });
                    } else {
                        if (false) {
                            console.log($btn.attr('xlink:href'));
                            TweenLite.to('#swipe-btn', .1, {
                                x: 215
                            });
                            $('.unlock').addClass('unlocked');
                        } else {
                            TweenLite.to('#swipe-btn', .1, {
                                x: 215
                            });
                            $('.error').addClass('errored');
                            setTimeout(function() {
                                TweenLite.to('#swipe-btn', .5, {
                                    x: 0
                                });
                                $('.error').removeClass('errored');
                            }, 5000);
                        }
                    }
                    endX = 0;
                }
            });
        }

        swipe();
    </script>
@endpush
