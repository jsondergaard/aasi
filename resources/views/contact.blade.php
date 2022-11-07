@extends('layouts.app')


@section('main')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1>Kontakt os</h1>

                <form action="#" method="post">
                    <div class="row">
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
                            <label for="inputBesked">Besked</label>
                            <textarea class="form-control" id="inputBesked" rows="5" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
