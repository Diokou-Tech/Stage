
@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-4">
                <h3>Ajouter un enseignant</h3>
            </div>
            <div class=" col-4">
               <a href=" {{ route('prof-index')}} " class="btn btn-sm btn-outline-secondary float-right">Retour</a>
            </div>
        </div>

            <div class="row bg-white pt-3 mt-2 ">
                <div class="col-sm-12">
                    <legend class="text-sm">Informations enseignant </legend>
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
                    <form action="{{ route('prof-store')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row d-flex justify-content-between">
                            <div class="col-5">
                                <div class="form-group mt-2 mr-3">
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
                                    <label for="name">Sexe:</label>
                                    <input type="text" id="sexe" name="sexe" required class="form-control" placeholder="Sexe..."/>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group mt-2 mr-3">
                                    <label for="name">Code Postal:</label>
                                    <input type="text" id="code_postal" name="code_postal" required class="form-control" 
                                        placeholder="Code Postal..."/>
                                </div>
                                <div class="form-group mt-2 mr-3">
                                    <label for="name">Numero portable:</label>
                                    <input type="text" id="portable" name="portable" required class="form-control" placeholder="Numero de portable..."/>
                                </div>
                                <div class="form-group mt-2 mr-3">
                                    <label for="name">Adresse:</label>
                                    <input type="text" id="adresse" name="adresse" required class="form-control" placeholder="Adresse..."/>
                                </div>
                                <fieldset>
                                    <legend class="text-sm">Identifiants de connexion</legend>
                                <div class="form-group mt-2 mr-3">
                                    <label for="name">E-mail:</label>
                                    <input type="email" id="email" name="email" required class="form-control" placeholder="Adresse e-mail..."/>
                                </div>
                                <div class="form-group mt-2 mr-3">
                                    <label for="name">Mot  de passe:</label>
                                    <input type="password" id="password" name="password" required class="form-control" placeholder="Mot de passe..."/>
                                </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group float-left mt-4 text-center">
                        <button type="submit" class="btn btn-md btn-primary" >Ajouter</button>
                        </div>

                    </form>
                </div>
            
            </div>

       
    </div><!--Fin de Container-->
@endsection