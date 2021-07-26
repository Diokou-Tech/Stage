@extends('layouts.template')
@section('content')
<div class='container'>
    <div class="row justifu-contetent-center ml-10">
        <div class="col-sm-0 col-md-6">
                <h4>{{$total}} Parcours enregistrés</h4>
                <strong> </strong>
        </div>
        <div class="col-sm-12 col-md-6">
            <form class="form-inline mt-2 mt-md-0">
                <div class="input-group mb-0 mt-0"> 
                        <input class="form-control mr-sm-0" type="text" name="p"  value="" placeholder="Rechercher..." aria-label="Recherche">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
                        <a href="" class="btn btn-outline-danger">Annuler</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    

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
             <hr class="featurette-divider">
             <!--Button Ajouter et de PDF -->
             <div class="float-right mr-3">
                    <!-- Botton de la modal d'ajout de Bureaux-->
                    
        
                     <a href="{{route('classe-create')}}" class="btn btn-sm btn-outline-primary ml-3 mr-2 mb-3" > <i class="fas fa-plus"></i> Ajouter </a>                    
             </div>
        </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-sm table-hover ">
                        <thead class="table-dark">
                            <tr>
                                <!-- <th>id</th> -->
                                <th>Nom</th>
                                <th>Annee</th>
                                <th>Niveau</th>
                                <th>Responsable</th>                
                                <th>Actions</th>                          
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($classes as $classe)
                                <tr>
                                    <!-- <td>{{$classe->id}}</td>    -->
 
                                    <td>{{$classe->nom}}</td>   
                                    <td>{{$classe->annee}}</td>   
                                    <td>{{$classe->niveau}}</td>   
                                    <td>{{$classe->enseignant->matricule}} {{$classe->enseignant->nom}}</td>   
                                     <td class='d-flex'>                                        
                                        <a href="{{ route('classe-edit', ['id'=>$classe->id])}}" class="btn btn-sm btn-primary m-1"><i class="fas fa-edit"></i></a>
                                        <form action=" {{ route('classe-destroy', ['id'=>$classe->id])}} 
                                        " method="post"
                                         onsubmit=" return confirm('Suppression! Êtes-vous sûr de le supprimer ?');">
                                        @csrf
                                        @method('DELETE')
                
                                        <button type="submit" class="btn btn-sm btn-danger m-1"><i class="fas fa-trash"></i></button> <!--<i class="fa fa-trash"></i>-->
                                        </form>
                                     </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{ $classes->links() }}
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection