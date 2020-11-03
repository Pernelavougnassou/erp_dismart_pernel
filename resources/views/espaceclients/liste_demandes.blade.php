@extends('espaceclients.navbar')

@section('contenu')
    <div class="table-responsive">
        <table class="table" id="demandes-table">
            <thead class="thead-dark">
            <tr>
                <th>Objet</th>
                <th>Departement Id</th>
                <th>Projet User Id</th>
                <th>Message</th>
                <th>Niveau Importance Id</th>
                <th>Type Demande Id</th>
                <th>Statut</th>
                <th>Responsable</th>
                <th>Date fermeture</th>
            </tr>
            </thead>
            <tbody>
            @foreach($demandes as $demande)
                <tr>
                    <td>{{ $demande ->objet }}</td>

                    @foreach($departements as $departement)
                        @if($demande->departement_id == $departement->id)
                            <td>{{ $departement->nom_departement }}</td>
                        @endif
                    @endforeach

                    @foreach($projets as $projet)
                        @if($demande->projet_user_id == $projet->id)
                            <td>{{ $projet->nom_projet }}</td>
                        @endif
                    @endforeach

                    <td>{{ $demande->message }}</td>

                    @foreach($niveau_importances as $niveau_importance)
                        @if($demande->niveau_importance_id == $niveau_importance->id)
                            <td>{{ $niveau_importance->niveau }}</td>
                        @endif
                    @endforeach

                    @foreach($type_demandes as $type_demande)
                        @if($demande->type_demande_id == $type_demande->id)
                            <td>{{ $type_demande->type }}</td>
                        @endif
                    @endforeach

                    @if ($demande->statut == 0)
                        <td>ENCOU</td>
                    @elseif ($demande->statut == 1)
                        <td>EXPIR</td>
                    @else
                        <td>SUSPE</td>
                    @endif

                    @foreach($users as $user)
                        @if($demande->responsable == $user->id)
                            <td>{{ $user->nom }}</td>
                        @endif
                    @endforeach
                    <td>{{ $demande->date_fermeture->toDateString() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
