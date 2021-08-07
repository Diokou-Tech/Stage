@extends('layouts.encadreur')
@section('content')
<div class='container-fluid '>
    <div class="row justify-content-center mx-auto">      
        <P>
            Ce tableau regroupe les dépôts de stage de votre parcours dont vous etes responsable .
        </P>
        <h4> <b>{{ $stages->count() }} depôt(s) </b>
            @if($enseignant->classes != null)
        <a target="_blank" href="{{ route('encadreur-print') }}" class="btn btn-info d-inline text-sm"><i class="fa fa-file-pdf"></i> Imprimer en PDF</a>
            @endif
        </h4>             
            <hr class="featurette-divider">
        </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-sm table-hover text-center">
                        <thead class="active">
                            <tr>
                                <th>Entreprise</th>
                                <th>Lieu</th>
                                <th>Tuteur Stage</th>                          
                                <th>Etudiant</th>                          
                                <th>Email Etudiant</th>                          
                                <th>Debut Stage</th>                          
                                <th>Fin stage</th>                          
                                <th>Fiche</th>                       
                                <th>Date</th>                                                             
                                <th>Actions</th>                          
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($stages as $stage)
                                <tr>
                                    <td>{{$stage->entreprise}}</td>   
                                    <td>{{$stage->lieu}}</td>  
                                    <td>{{$stage->tuteur_entreprise}}</td>   
                                    <td>{{$stage->etudiant->nom}} {{$stage->etudiant->prenom}}</td>   
                                    {{-- <td>{{$stage->tuteur_entreprise_tel}}</td>    --}}
                                    <td>{{$stage->tuteur_entreprise_email}}</td>   
                                    <td>{{$stage->date_debut}}</td>   
                                    <td>{{$stage->date_fin}}</td>   
                                    <td><a target="_blank" href="../../../../Fiches_Stages/{{ $stage->fiche }}" class="text-dark"><i class="fa fa-file-alt"></i></a></td>    
                                    <td>{{$stage->created_at}}</td>  
                                     <td class='d-flex'>
                                        <a title="afficher" href="{{ route('encadreur-show', ['id'=>$stage->id])}}" class="btn btn-sm btn-info m-2 text-white"><i class="fas fa-eye"></i></a>
                                        @if($stage->signe != null)
                                        <a title="signer" href="{{ route('encadreur-signer', ['id'=>$stage->id])}}" class="btn btn-sm btn-success m-2"><i class="fas fa-signature"></i></a>
                                         @else
                                         <a title="signer" href="{{ route('encadreur-signer', ['id'=>$stage->id])}}" class="btn btn-sm btn-secondary m-2 text-dark"><i class="fas fa-signature"></i></a>
                                         @endif 
                                         @if($stage->enseignant_id != null)
                                         <a title="affecter" href="{{ route('encadreur-affecter', ['id'=>$stage->id])}}" class="btn btn-sm btn-success m-2"><i class="fas fa-user"></i></a>
                                          @else
                                          <a title="affecter" href="{{ route('encadreur-affecter', ['id'=>$stage->id])}}" class="btn btn-sm btn-secondary m-2 text-dark"><i class="fas fa-user"></i></a>
                                          @endif
                                    </td>          
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{-- {{ $stages->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection