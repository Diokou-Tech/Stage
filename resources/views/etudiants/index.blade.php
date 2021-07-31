@extends('layouts.template')
@section('content')
<div class='container'>
    <div class="row justifu-contetent-center ml-10">
        <div class="col-sm-0 col-md-6">
                <h4>{{$total}} Etudiants enregistrés</h4>
                <strong> </strong>
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

            <!-- ALERT DE SUCCESS -->
            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success')}}</p>
            </div>
            @endif
             <hr class="featurette-divider">
             <!--Button Ajouter et de PDF -->
             <div class="float-right mr-3">
                    <!-- Botton de la modal d'ajout de Bureaux-->
                    
        
                     <a href="{{route('etudiant-create')}}" class="btn btn-sm btn-outline-primary ml-3 mr-2 mb-3" > <i class="fas fa-plus"></i> Ajouter </a>               
             </div>
        </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-sm table-hover" id="table">
                        <thead class="active">
                            <tr>
                                <!-- <th>id</th> -->
                                <th>Matricule</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>E-mail</th>    
                                <th>Tel</th>   
                                <th>Parcours</th>                    
                                <th>Actions</th>                          
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($etudiants as $etudiant)
                                <tr>
                                    <!-- <td>{{$etudiant->id}}</td>    -->
                                    <td>{{$etudiant->matricule}}</td>   
                                    <td>{{$etudiant->prenom}}</td>   
                                    <td>{{$etudiant->nom}}</td>   
                                    <td>{{$etudiant->email}}</td>   
                                    <td>{{$etudiant->portable}}</td>   
                                    <td>{{ $etudiant->classe->nom }} {{ $etudiant->classe->niveau }}</td>
                                     <td class='d-flex'>
                                        <a href="{{ route('etudiant-edit', ['id'=>$etudiant->id])}}" class="btn btn-sm btn-primary m-1"><i class="fas fa-edit"></i></a>
                                        <form action=" {{ route('etudiant-destroy', ['id'=>$etudiant->id])}} 
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
                </div>
            </div>
        </div>

</div>
@endsection