
@extends('layouts.template')
@section('content')
    <div class="container ">
        <div class="row d-flex justify-content-around">
            <div class="col-sm-12 col-md-6">
                <h4>Ajouter un etudiant</h4>
            </div>
            <div class="col-sm-12 col-md-6">
               <a href=" {{ route('etudiant-index')}} " class="btn btn-md btn-primary float-right">Retour</a>
            </div>
            </div>

            <div class="row bg-white pt-3 mt-2 ">
                <div class="col-sm-12">
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
                    <form action="{{ route('etudiant-store')}}" class="row d-flex" method="POST">
                        @csrf
                        @method('POST')
                        <div class="col-6">
                            <fieldset>
                                <legend class="md">Informations necessaires</legend>
                            <div class="form-group mt-2  ">
                                <label for="name">Matricule:</label>
                                <input type="text" id="matricule" name="matricule" required class="form-control" placeholder="Matricule..."/>
                            </div>
                            <div class="form-group mt-2 mr-3">
                                <label for="name">Prenom:</label>
                                <input type="text" id="prenom" name="prenom" required class="form-control" placeholder="Prenoms..."/>
                            </div>
                            <div class="form-group mt-2 mr-3">
                                <label for="name">Nom:</label>
                                <input type="text" id="nom" name="nom" required class="form-control" placeholder="Nom..."/>
                            </div>
                            <div class="form-group mt-2 mr-3">
                                <label for="name">Numero portable:</label>
                                <input type="text" id="portable" name="portable" required class="form-control" placeholder="Numero de portable..."/>
                            </div>
                            <div class="form-group mt-2 mr-3">
                                <label for="classe_id">Parcours :</label>
                                
                                <select name="classe_id" id="classe_id" class="form-control" required>
                                    <option>selectionner le parcours ...</option>
                                    @foreach($classes as $parcours))
                                    <option value="{{ $parcours->id }} "> {{$parcours->nom}} {{ $parcours->annee }} {{ $parcours->niveau }} </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group mt-2 mr-3">
                                <label for="name">Sexe:</label>
                                <select name="sexe" id="sexe" class="form-control" required>
                                    <option value=""> -- choisir le sexe --</option>
                                    <option value="F">Féminin</option>
                                    <option value="M">Masculin</option>
                                </select>
                            </div> --}}
                        </fieldset>
                        </div>
                        <div class="col-6">                            
                            <fieldset>
                                <legend class="text-md">Idenfiants de connexion</legend>
                                <div class="form-group mt-2 mr-3">
                                    <label for="name">E-mail:</label>
                                    <input type="email" id="email" name="email" required class="form-control" placeholder="Adresse e-mail..."/>
                                </div>
                                <div class="form-group ml-3 mr-3">
                                    <div class="form-group mt-2 mr-3">
                                        <label for="name">Mot  de passe:</label>
                                        <input type="password" id="password" name="password" required class="form-control" placeholder="Mot de passe..."/>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        </div>
                       

                        <div class="form-group float-left mt-2 mt-2">
                        <button type="submit" class="btn btn-md btn-primary" >Envoyer</button>
                        </div>

                    </form>
                </div>
            
            </div>

       
    </div><!--Fin de Container-->
@endsection