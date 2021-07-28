
@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class=" border-0 m-0 col-4"> 
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb border-0">
                      <li class="breadcrumb-item "><a href="{{ route('prof-index')}}">Enseignants</a></li>
                      <li class="breadcrumb-item" aria-current="page">Ajout d'un enseignant</li>
                    </ol>
                </nav>   
               {{-- <a href=" {{ route('prof-index')}} " class="btn btn-sm btn-outline-secondary float-right">Retour</a> --}}
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
                                    <input type="text" id="matricule" name="matricule" value="{{ old('matricule') }}" required class="form-control" placeholder="Matricule..."/>
                                </div>
                                <div class="form-group mt-2 mr-3">
                                    <label for="name">Prenom:</label>
                                    <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" required class="form-control" placeholder="Prenoms..."/>
                                </div>
                                <div class="form-group mt-2 mr-3">
                                    <label for="name">Nom:</label>
                                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required class="form-control" placeholder="Nom..."/>
                                </div>
                                <div class="form-group mt-2 mr-3">
                                    <label for="name">Numero portable:</label>
                                    <input type="text" id="portable" name="portable"  value="{{ old('portable') }}" required class="form-control" placeholder="Numero de portable..."/>
                                </div>
                                <div class="form-group mt-2 mr-3">
                                    <label for="name">specialite:</label>
                                    <input type="text" id="specialite" name="specialite" value="{{ old('specialite') }}" required class="form-control" placeholder="specialite "/>
                                </div>
                            </div>
                            <div class="col-5">
                                <fieldset>
                                    <legend class="text-sm">Identifiants de connexion</legend>
                                <div class="form-group mt-2 mr-3">
                                    <label for="name">E-mail:</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" required class="form-control" placeholder="Adresse e-mail..."/>
                                </div>
                                <div class="form-group mt-2 mr-3">
                                    <label for="name">Mot  de passe:</label>
                                    <input type="password" id="password" name="password" required class="form-control" placeholder="Mot de passe..."/>
                                </div>
                                <div class="form-group mt-2 mr-3">
                                    <label for="password_confirmation">Comfirmez Mot  de passe:</label>
                                    <input type="password" id="password_confirmation "  name="password_confirmation " required class="form-control" placeholder="Comfirmez mot de passe"/>
                                </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group float-left mt-4 text-center">
                        <button type="submit" class="btn btn-md btn-primary" > Ajouter</button>
                        </div>

                    </form>
                </div>
            
            </div>

       
    </div><!--Fin de Container-->
@endsection