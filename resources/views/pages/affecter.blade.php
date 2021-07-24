@extends('layouts.template')
@section('content')
<div class='container'>
    <div class="row d-flex justify-content-evenly">
        <div class="col-5">
            <h3 class="text-center">Disponibilité</h3>
            <ul class="list-group-flush">
                <li class="list-group-item d-flex justify-content-around align-items-center">{{ $voeu1->matricule }} {{ $voeu1->nom }} {{ $voeu1->prenom }} <span class="bg-warning text-white p-2 rounded"> {{ $voeu1->stages->count() }} encadré(s)</span></li>
                <li class="list-group-item d-flex justify-content-around align-items-center">{{ $voeu2->matricule }} {{ $voeu2->nom }} {{ $voeu2->prenom }} <span class="bg-warning text-white p-2 rounded"> {{ $voeu2->stages->count() }} encadré(s)</span></li>
                <li class="list-group-item d-flex justify-content-around align-items-center">{{ $voeu3->matricule }} {{ $voeu3->nom }} {{ $voeu3->prenom }} <span class="bg-warning text-white p-2 rounded"> {{ $voeu3->stages->count() }} encadré(s)</span></li>
            </ul>
        </div>
        <div class="col-5">
            <h3 class="text-center">Etudiant</h3>
            <ul class="list-group-flush">
                <li class="list-group-item">Nom : <b>{{ $stage->etudiant->nom }}</b></li>
                <li class="list-group-item">Prenom : <b>{{  $stage->etudiant->prenom }} </b></li>
                <li class="list-group-item">Matricule : <b>{{  $stage->etudiant->matricule }} </b></li>
            </ul>
        </div>
        <form action="{{ route('affecter') }}" method="post" class="col-5 mx-auto">
            @csrf
            <div class="form-group mt-4">
                <input type="hidden" name="id_stage" id="id_stage" value="{{$id_stage}}" class="form-control" placeholder="Votre id">
            </div>
            <div class="form-group mt-4">
                <label for="choix" class="d-block">Choix de l'encadreur</label>
                <select name="choix" id="choix" class="form-control  @error('choix') is-invalid @enderror">
                    <option>Selectionner l'encadreur </option>
                        @foreach($enseignants as $responsable)
                        <option value="{{$responsable->id}}" @if($stage->enseignant_id == $responsable->id ) selected @endif> {{$responsable->matricule}} {{$responsable->nom}}  {{ $responsable->stages->count() }} encadré(s)</option>
                        @endforeach
                </select>
                @error('voeu1')
                <small>{{ $message }}  </small> 
                @enderror
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Affecter</button>
            </div>
        </form>
    </div>
</div>
@endsection