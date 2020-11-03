@extends('espaceclients.navbar')

@section('contenu')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Vos données personnelles</h5>
                <table class="table">
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>Votre Nom</td>
                            <td>{{ $user->nom }}</td>
                        </tr>
                        <tr>
                            <td>Votre Prenom</td>
                            <td>{{ $user->prenom }}</td>
                        </tr>
                        <tr>
                            <td>Votre Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Votre fonction</td>
                            <td>{{ $user->fonction }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a type="button" class="btn btn-info btn-lg btn-block" href="{{ route('editerprofil') }}">
                    Modifier le profil
                </a>
            </div>
        </div>
    </div>
@endsection
