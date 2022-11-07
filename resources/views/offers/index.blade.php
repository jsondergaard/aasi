@extends('layouts.app')

@section('main')

    <div class="container mt-4">
      <div class="row">
        <div class="col-md-4 coupon">
            <a href="#" data-bs-toggle="modal" data-bs-target="#couponModal" class="text-decoration-none text-muted">
                <div class="card card-cover bg-cover shadow-sm" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)), url('https://picsum.photos/500');">
                  <span style="margin-top: 1.5rem;margin-bottom: 5rem;" class="badge text-bg-primary">Primary</span>
                    <!-- Pills hvis der skal markater -->
                    <div class="card-body" style="color:white;">
                        <h3 style="text-shadow: 1px 1px 1px black;">Old Irish</h3>
                        <p class="card-text" style="text-shadow: 1px 1px 1px black;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4 g-4 mt-4">
          <a href="#" class="text-decoration-none text-muted" data-bs-toggle="modal" data-bs-target="#couponModal">
              <div class="card card-cover bg-cover shadow-sm" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)), url('https://picsum.photos/500');">
                  <!--<span style="margin-top: 1.5rem;margin-bottom: 5rem;" class="vehicle->energy_rating">energy_rating</span>-->
                  <span style="margin-top: 1.5rem;margin-bottom: 5rem;" class="badge text-bg-primary">Primary</span>
                  <div class="p-4">
                      <h3 class="text-gray-100 mb-2 text-truncate">
                          title
                      </h3>
                      <div class="d-flex justify-content-between">
                          <p class="h6 text-uppercase text-gray-200 mb-0 align-self-center">
                              11 km
                          </p>
                          <p class="h6 text-uppercase text-gray-200 mb-0 ml-auto align-self-center">
                              year
                          </p>
                          <p class="h5 text-uppercase text-gray-200 mb-0 ml-auto align-self-center">
                              price
                          </p>
                      </div>
                  </div>
              </div>
          </a>
      </div>
    </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="couponModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="couponModaldropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="couponModaldropLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
          </div>
        </div>
      </div>
    </div>
@endsection
