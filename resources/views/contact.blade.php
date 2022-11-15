@extends('layouts.app')


@section('main')
<div class="container mt-4">
    <form action="#" method="post">
        <div class="col-12">
            <h1>Kontakt os</h1>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="name">Navn</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="col-6">
                    <label for="department">Afdeling</label>
                    <select class="form-select" id="department" name="department">
                        <option selected>Vælg afdeling</option>
                        <option value="Badminton">Badminton</option>
                        <option value="Fodbold">Fodbold</option>
                        <option value="Håndbold">Håndbold</option>
                        <option value="Svømning">Svømning</option>
                        <option value="Volley">Volley</option>
                        <option value="Andet">Andet</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="name" required>
                    </div>
                </div>

                <div class="col-6">
                    <label for="subject">Emne</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="message">Besked</label>
                    <textarea class="form-control" id="message" rows="5" name="message" required></textarea>
                </div>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#succesModal">
                Send
            </button>
        </div>
        <div class="modal fade" id="succesModal" tabindex="-1" aria-labelledby="succesModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="succesModalLabel">Succes!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Beskeden er blevet sendt.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Luk</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
