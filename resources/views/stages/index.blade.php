@extends('layouts.etudiant')
@section('content')
<div class='container-fluid mx-2'>

    <div class="row justifu-contetent-center ml-10">
        <div class="col-sm-0 col-md-6">
                <h4>{{$total}} Stages enregistrés</h4>
                <strong> </strong>
        </div>                          
            <hr class="featurette-divider">
        </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-sm table-hover ">
                        <thead class="active">
                            <tr>
                                <th>Entreprise</th>
                                <th>Lieu</th>
                                <th>Tuteur stage</th>                          
                                <th>Portable Tuteur</th>                          
                                <th>Email Tuteur</th>                          
                                <th>Debut stage</th>                          
                                <th>Fin stage</th>                          
                                <th>Fiche</th>     
                                <th>Signe</th> 
                                <th>Affecter</th>                    
                                <th>Date de transmission</th>                                                        
                                <th>Actions</th>                          
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($stages as $stage)
                                <tr>
                                    <td>{{$stage->entreprise}}</td>   
                                    <td>{{$stage->lieu}}</td>  
                                    <td>{{$stage->tuteur_entreprise}}</td>   
                                    <td>{{$stage->tuteur_entreprise_tel}}</td>   
                                    <td>{{$stage->tuteur_entreprise_email}}</td>   
                                    <td>{{$stage->date_debut}}</td>   
                                    <td>{{$stage->date_fin}}</td>   
                                    <td><a target="_blank" href="../../../../Fiches_Stages/{{ $stage->fiche }}" class="text-dark">fiche de renseignement</a></td>    
                                    <td> @if ($stage->enseignant_id != null)
                                        <i class="fa fa-signature text-success"></i>
                                        @else
                                        <i class="fa fa-signature text-danger"></i>
                                        @endif
                                    </td>
                                    <td> @if ($stage->signe != null)
                                        <i class="fa fa-check-double text-success"></i>
                                        @else
                                        <i class="fa fa-check text-danger"></i>
                                        @endif
                                    </td>
                                    <td>{{$stage->created_at}}</td>  
                                     <td class='d-flex justify-between'>
                                         @if($stage->enseignant_id != null && $stage->signe != null)
                                        <a href="{{ route('stage-show', ['id'=>$stage->id])}}" class="btn btn-sm btn-info m-2 text-white"><i class="fas fa-eye"></i></a>
                                         @endif
                                        <a href="{{ route('stage-edit', ['id'=>$stage->id])}}" class="btn btn-sm btn-primary m-2"><i class="fas fa-edit"></i></a>
                                        <form action=" {{ route('stage-destroy', ['id'=>$stage->id])}} 
                                        " method="post"
                                         onsubmit=" return confirm('Suppression! Êtes-vous sûr de le supprimer ?');">
                                        @csrf
                                        @method('DELETE')
                
                                        <button type="submit" class="btn btn-sm btn-danger m-2"><i class="fas fa-trash"></i></button>
                                        </form>
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