@extends('layouts.encadreur')
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
                <li class="list-group-item">Nom : <b>{{ $enseignant->nom }}</b> </li>
                <li class="list-group-item">Prenom : <b>{{ $enseignant->prenom }}</b> </li>
                <li class="list-group-item">Matricule : <b>{{ $enseignant->matricule }}</b> </li>
                <li class="list-group-item">E-mail : <b>{{ $enseignant->email }}</b> </li>
                <li class="list-group-item">Portable : <b>{{ $enseignant->portable }}</b> </li>
                <li class="list-group-item">Specialite : <b>{{ $enseignant->specialite }}</b> </li>
                @if($enseignant->classes != null)
                <li class="list-group-item">Parcours responsable : <b>{{ $enseignant->classes->nom }} {{ $enseignant->classes->niveau }}</b> </li>
                @else
                <li class="list-group-item">Type : <b> Encadreur </b> </li>
                @endif
            </ul>
            <a class="btn btn-primary" href="{{ route('profil-update-enseignant') }}">Modifier mot de passe</a>
        </div>
@endsection