@extends('espaceclients.navbar')

@section('contenu')
    <form method="post" action="{{ url('editerprofil') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md">
                <label for="inputNom">Nom</label>
                @foreach($users as $nom)
                    <input> {{ $nom }}
                @endforeach
            </div>
            <div class="form-group col-md">
                <label for="inputPrenom">Prénom</label>
                    <input type="text" class="form-control border border-primary" id="inputPrenom">
            </div>
            <div class="form-group col-md">
                <label for="inputEmail">Email</label>
                    <input type="text" class="form-control border border-primary" id="inputEmail">
            </div>

            <div class="form-group col-md">
                <label for="inputPassword">Password</label>
                    <input type="text" class="form-control border border-primary" id="inputPassword">
            </div>
            <div class="form-group col-md">
                <label for="inputFonction">Fonction</label>
                    <input type="text" class="form-control border border-primary" id="inputFonction">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Soumettre votre demande</button>
    </form>
@endsection
