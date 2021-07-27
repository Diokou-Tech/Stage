
@extends('layouts.template')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb border-0 m-0">
            <ol class="breadcrumb border-0">
              <li class="breadcrumb-item "><a href="{{ route('classe-index')}} ">Parcours</a></li>
              <li class="breadcrumb-item" aria-current="page">Ajout d'un parcours</li>
            </ol>
        </nav>   


            <div class="row bg-white pt-3 mt-2 ">
                <div class="col-sm-12">
                    <h5 class="text-center">Informez les infos de Parcours :</h5>
                    <br/>
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
                <div class="col-sm-12">
                    <form action="{{ route('classe-store')}}" method="POST" class="col-6 mx-auto">
                        @csrf
                        @method('POST')
                        
                        <div class="form-group ml-3 mr-3">
                            <label for="nom">Nom parcours:</label>
                            <input type="text" id="nom" name="nom" required class="form-control" placeholder="Parcours..."/>
                        </div>
                        <div class="form-group ml-3 mr-3">
                            <label for="annee">Année:</label>
                            <input type="text" id="annee" name="annee" required class="form-control" placeholder="Année exp. 2021-2022..."/>
                        </div>

                        <div class="form-group ml-3 mr-3">
                            <label for="niveau">Niveau:</label>
                            <input type="text" id="niveau" name="niveau" required class="form-control" placeholder="Niveau..."/>
                        </div>
                        <div class="form-group ml-3 mr-3">
                            <label for="enseignant_id">Responsable de parcours:</label>
                           
                                <select name="enseignant_id" id="enseignant_id" class="form-control" required>
                                    <option>selectionner le responsable de parcours ...</option>
                                    @foreach($enseignants as $prof))
                                    <option value="{{ $prof->id }} "> {{$prof->matricule}} {{ $prof->prenom }} {{ $prof->nom }} </option>
                                    @endforeach
                        </select>
                        </div>
                      
                        <div class="form-group float-left mt-2 ml-3">
                        <button type="submit" class="btn btn-md btn-primary" >Ajouter</button>
                        </div>

                    </form>
                </div>
            
            </div>

       
    </div><!--Fin de Container-->
@endsection