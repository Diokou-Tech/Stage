@extends('layouts.etudiant')
@section('content')
<div class='container'>
       <div class="row bg-white pt-3 mt-1 mb-3">
       <div class="col-sm-12">
                <!-- MESSAGE DE ERREUR -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-5 mx-auto">
            <h4> Informations du Profil </h4>
            <ul class="list-group-flush">
                <li class="list-group-item">Nom : <b>{{ $etudiant->nom }}</b> </li>
                <li class="list-group-item">Prenom : <b>{{ $etudiant->prenom }}</b> </li>
                <li class="list-group-item">Matricule : <b>{{ $etudiant->matricule }}</b> </li>
                <li class="list-group-item">E-mail : <b>{{ $etudiant->email }}</b> </li>
                <li class="list-group-item">Portable : <b>{{ $etudiant->portable }}</b> </li>
                <li class="list-group-item">Parcours : <b>{{ $etudiant->classe->nom }}</b> </li>
                <li class="list-group-item">Niveau :<b>{{ $etudiant->classe->niveau }}</b> </li>
            </ul>
            <a class="btn btn-primary" href="{{ route('profil-update') }}">Modifier mot de passe</a>
        </div>
@endsection