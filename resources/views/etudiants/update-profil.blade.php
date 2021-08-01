@extends('layouts.etudiant')
@section('content')
    <div class='container'>
        <div class="row bg-white pt-3 mt-1 mb-3">
            <div class=" border-0 m-0 col-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb border-0">
                        <li class="breadcrumb-item "><a href="{{ route('profil') }} ">Profil</a></li>
                        <li class="breadcrumb-item" aria-current="page">Modification mot de passe</li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-12">
            </div>
            <div class="card col-lg-6 col-md-8 col-sm-12 mx-auto">
                <div class="card-header">Les infos de profil </div>
                <div class="card-body">
                    <i class="text-warning"> Notez votre mot de passe quelquel part</i>
                    <form method="POST" action="{{ route('profil-update') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Matricule :') }}</label>
                            <div class="col-md-6 ">
                                <strong>
                                    {{ $etudiant->matricule }}
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nom et Prenom') }}</label>
                            <div class="col-md-6">
                                <input id="name" disabled="disabled" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $user->name }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">Nouveau mot de passe</label>
                            <div class="col-md-6">
                                <input id="password" type="password" value=""
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">Comfirmation mot de passe</label>
                            <div class="col-md-6">
                                <input id="password_confirmation_" type="password" 
                                    class="form-control @error('password_confirmation_') is-invalid @enderror" name="password_confirmation_" required
                                    autocomplete="new-password">
                                @error('password_confirmation_')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Mettre à jour
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endsection
