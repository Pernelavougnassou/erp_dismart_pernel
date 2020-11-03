@extends('espaceclients.navbar')

@section('contenu')
<form method="post" action="{{ url('demandeform') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputObjet">Objet</label>
            <input type="text" class="form-control border border-primary" id="inputObjet" name="objet">
        </div>

        <div class="form-group col-md-6">
            <label for="inputProjetUser">Projet User Id</label>
            <select id="inputProjetUser" class="form-control border border-primary" name="projetuser">
                @foreach($projetItems  as $projet)
                    <option value="">{{ $projet }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="Messagearea">Message</label>
        <textarea type="text" class="form-control border border-primary" name="message" id="Messagearea"
                  rows="3" placeholder="Entrer votre message">
        </textarea>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputNiveau">Niveau Importance Id</label>
            <select id="inputNiveau" class="form-control border border-primary" name="niveau">
                @foreach($niveau_importanceItems  as $niveau)
                    <option value="">{{ $niveau }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="inputTypeDemande">Type Demande Id</label>
            <select id="inputTypeDemande" class="form-control border border-primary" name="type">
                @foreach($type_demandeItems  as $type)
                    <option value="">{{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="inputStatut">Statut</label>
            <select id="inputStatut" class="form-control border border-primary" name="statut">
                @foreach($contratItems  as $statut)
                    <option value="">{{ $statut }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputResponsable">Responsable</label>
            <select id="inputResponsable" class="form-control border border-primary" name="responsable">
                @foreach($responsableItems  as $responsable)
                    <option value="">{{ $responsable }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputDate">Date fermeture</label>
            <input type="date" class="form-control border border-primary" id="inputDate" name="date">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Soumettre votre demande</button>
</form>
@endsection
