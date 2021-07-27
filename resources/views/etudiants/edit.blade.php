
@extends('layouts.template')
@section('content')
    <div class="container">
        <div class=" border-0 m-0 col-4"> 
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb border-0">
                  <li class="breadcrumb-item "><a href="{{ route('etudiant-index')}} ">Etudiants</a></li>
                  <li class="breadcrumb-item" aria-current="page">Modification Etudiant</li>
                </ol>
            </nav>   
        </div>
        <div class="row">
            </div>

            <div class="row bg-white pt-3 mt-2 ">
                <div class="col-sm-12">
                    <h5>Informez les infos de l'etudiant:</h5>
                    <br/>
                </div>
                <div class="col-sm-12">
                    <form action="{{ route('etudiant-update', ['id'=>$etudiant->id])}}" class="d-flex justify-content-around" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-5">
                            <div class="form-group mt-2 mr-3">
                                <label for="name">Matricule:</label>
                                <input type="text" id="matricule" name="matricule" required  value="{{$etudiant->matricule}}" class="form-control" placeholder="Matricule..."/>
                            </div>
                            <div class="form-group mt-2 mr-3">
                                <label for="name">Prenom:</label>
                                <input type="text" id="prenom" name="prenom" required  value="{{$etudiant->prenom}}" class="form-control" placeholder="Prenoms..."/>
                            </div>
                            <div class="form-group mt-2 mr-3">
                                <label for="name">Nom:</label>
                                <input type="text" id="nom" name="nom" required  value="{{$etudiant->nom}}" class="form-control" placeholder="Nom..."/>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group mt-2 mr-3">
                                <label for="name">Numero portable:</label>
                                <input type="text" id="portable" name="portable" required  value="{{$etudiant->portable}}" class="form-control" placeholder="Numero de portable..."/>
                            </div>
                            <div class="form-group mt-2 mr-3">
                                <label for="name">E-mail:</label>
                                <input type="email" id="email" name="email" required  value="{{$etudiant->email}}" class="form-control" placeholder="Adresse e-mail..."/>
                            </div>
                            <div class="form-group mt-2 mr-3">
                                <label for="classe_id">Parcours :</label>
                               
                                    <select name="classe_id" id="classe_id" class="form-control" required>
                                        <option>selectionner le parcours ...</option>
                                        @foreach($classes as $parcours))                                    
                                        <option <?= $etudiant->classe_id==$parcours->id ? 'selected' : '' ?> value="{{ $parcours->id }} "> {{$parcours->nom}} {{ $parcours->annee }} {{ $parcours->niveau }} </option>
                                        @endforeach
                            </select>
                            </div>
                        
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-md btn-primary" >Mettre à jour</button>
                                </div>
                        </div>

                    </form>
                </div>
            
            </div>

       
    </div><!--Fin de Container-->
@endsection