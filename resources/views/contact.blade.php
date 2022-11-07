@extends('layouts.app')


@section('main')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="contact-form">
                <h1>Contact Us</h1>
                <p class="hint-text">We'd love to hear from you, please drop us a line if you've any query or question.
                </p>
                <form action="/examples/actions/confirmation.php" method="post">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputNavn">Navn</label>
                                <input type="text" class="form-control" id="inputNavn" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                        <select class="form-select" id="inputSelect">
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

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputTelefon">Telefon</label>
                                <input type="text" class="form-control" id="inputTelefon" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmne">Emne</label>
                        <input type="text" class="form-control" id="inputEmne" required>
                    </div>
                    <div class="form-group">
                        <label for="inputBesked">Besked</label>
                        <textarea class="form-control" id="inputBesked" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>


</form>
</div>
@endsection