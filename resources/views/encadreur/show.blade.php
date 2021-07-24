@extends('layouts.encadreur')
@section('content')
<div class='container'>
    <div class="row mb-4">
        <div class=" border-0 m-0 col-4"> 
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb border-0">
                  <li class="breadcrumb-item "><a href="{{ route('encadreur-dashboard')}}">Tableau de Bord</a></li>
                  <li class="breadcrumb-item" aria-current="page">Affichage</li>
                </ol>
            </nav>   
        </div>
    </div>
       <div class="row bg-white pt-3 mt-1 mb-3">
       <div class="col-sm-12">
                <div class="d-flex">
                        <div class="col-4">
                            <h4>Stage</h4>
                            <ul class="list-group-flush">
                                <li class="list-group-item">
                                   <b> <a target="_blank" href="../../../../Fiches_Stages/{{ $stage->fiche }}" class="text-dark">Voir Fiche de renseignement </a></b>
                                </li>
                                <li class="list-group-item">
                                    Entreprise :  <b>{{ $stage->entreprise  }}</b>
                                </li>
                                <li class="list-group-item">
                                    Secteur Activité :  <b>{{ $stage->secteur_activite  }}</b>
                                </li>
                                <li class="list-group-item">
                                    Lieu Stage : <b>{{ $stage->lieu  }}</b>
                                </li>
                                <li class="list-group-item">
                                    Date début : <b>{{ $stage->date_debut }}</b>
                                </li>
                                <li class="list-group-item">
                                    Date fin : <b>{{ $stage->date_fin }}</b>
                                </li>
                                <li class="list-group-item">
                                    Code Postal: <b> {{ $stage->cp }} </b>
                                </li>
                                <li class="list-group-item">
                                   Thème Stage : <b>{{ $stage->date_debut }}</b>
                                </li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <h4>Tuteur</h4>
                            <ul class="list-group-flush">
                                <li class="list-group-item">
                                    Prenom Nom :  <b>{{ $stage->tuteur_entreprise   }}</b>
                                </li>
                                <li class="list-group-item">
                                    Addresse Email  : <b>{{ $stage->tuteur_entreprise_email  }}</b>
                                </li>
                                <li class="list-group-item">
                                    Téléphone : <b>{{ $stage->tuteur_entreprise_tel }}</b>
                                </li>
                            </ul>
                            <h4>L'étudiant</h4>
                            <ul class="list-group-flush">
                                <li class="list-group-item">
                                   Matricule: <b>{{$stage->etudiant->matricule}}</b>
                                 </li>
                                 <li class="list-group-item">
                                     Nom : <b>{{$stage->etudiant->nom}}</b>
                                 </li>
                                 <li class="list-group-item">
                                     Prenom : <b>{{$stage->etudiant->prenom}}</b>
                                 </li>
                                 <li class="list-group-item">
                                    E-mail : <b>{{$stage->etudiant->email}}</b>
                                </li>
                                <li class="list-group-item">
                                    Portable : <b>{{$stage->etudiant->portable}}</b>
                                </li>
                            </ul>
                        </div>
                        <div class="col-4">
                            {{-- <h4>Choix des encadreurs</h4>
                            <ul class="list-group-flush">
                                <li class="list-group-item">
                                    choix N°1: <b>{{$ens1->nom}} {{$ens1->prenom}} / {{$ens1->matricule}}</b>
                                 </li>
                                 <li class="list-group-item">
                                     choix  N°2 : <b> {{$ens2->nom}} {{$ens2->prenom}} / {{$ens2->matricule}} </b>
                                 </li>
                                 <li class="list-group-item">
                                     choix N°3: <b>{{$ens3->nom}} {{$ens3->prenom}} / {{$ens3->matricule}}</b>
                                 </li>
                            </ul> --}}
                            @if ($encadreur != null)
                            <h4>Encadreur affecté</h4>
                            <ul class="list-group-flush bg-success">
                                <li class="list-group-item">
                                   Nom Prenom : <b>{{ $encadreur->nom }} {{ $encadreur->prenom }} </b>
                                 </li>
                                 <li class="list-group-item">
                                    matricule :  <b>{{ $encadreur->matricule }}</b>
                                 </li>
                            </ul>
                            @else
                                <span class="bg-warning p-3">Encadreur non Affecté </span>
                            @endif

                        </div>
</div>
@endsection