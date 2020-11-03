@extends('espaceclients.navbar')

@section('contenu')
    @foreach($equipeprojets as $equipe)
    <div class="card" style="width: 18rem;">
        <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
            <div class="card-body">
                @foreach($projets as $projet)
                    @if($equipe->projet_id == $projet->id)
                <h4 class="card-title">{{ $projet->nom_projet }}</h4>
                    @endif
                @endforeach
                @foreach($users as $user)
                    @if($equipe->user_id == $user->id)
                        <p class="card-text">{{ $user->prenom}} {{ $user->nom}} </p>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
@endsection

