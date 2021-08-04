@extends('layouts.encadreur')
@section('content')
<div class='container-fluid'>
    <div class="row justify-content-center">   
        <P>
            Ce tableau regroupe les étudiants dont vous encadrez et leurs stages.
        </P>  
        <h4> <b>{{ $stages->count() }}</b> suivi(s) </h4>                  
            <hr class="featurette-divider">
        </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-sm table-hover ">
                        <thead class="active">
                            <tr>
                                <th>id</th>
                                <th>Entreprise</th>
                                <th>Lieu</th>
                                <th>Tuteur</th>                          
                                <th>Etudiant</th>                          
                                <th>Email Etudiant</th>                          
                                <th>Debut stage</th>                          
                                <th>Fin stage</th>                          
                                <th>Fiche</th>                       
                                <th>Date de transmission</th>                                                             
                                <th>Actions</th>                          
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($stages as $stage)
                                <tr>
                                    <td>{{$stage->id}}</td>   
 
                                    <td>{{$stage->entreprise}}</td>   
                                    <td>{{$stage->lieu}}</td>  
                                    <td>{{$stage->tuteur_entreprise}}</td>   
                                    <td>{{$stage->etudiant->nom}} {{$stage->etudiant->prenom}}</td>   
                                    <td>{{$stage->etudiant->email}}</td>  
                                    <td>{{$stage->date_debut}}</td>   
                                    <td>{{$stage->date_fin}}</td>   
                                    <td><a target="_blank" href="../../../../Fiches_Stages/{{ $stage->fiche }}" class="text-dark">fiche de renseignement</a></td>    
                                    <td>{{$stage->created_at}}</td>  
                                     <td class='d-flex'>
                                        <a href="{{ route('encadreur-show', ['id'=>$stage->id])}}" class="btn btn-sm btn-info m-2 text-white"><i class="fas fa-eye"></i></a>
                                     </td>          
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection