@extends('layouts.encadreur')
@section('content')
<div class='container'>
    <h5>Bienvenue {{  Str::ucfirst($enseignant->prenom)  }} {{ Str::upper( $enseignant->nom) }}</h5>
    <div class="d-flex justify-content-evenly">
        <div class="card shadow-lg p-1  text-white d-flex align-items-center justify-content-center c col-4 rounded-circle">
            <h2 class="text-center text-white"><i class="fas fa-poll"></i> <br> {{ $enseignant->stages->count() }} <br> Suivis</h2>
        </div>
      @if($enseignant->classes != null)
      <div class="card shadow-lg p-1  text-white d-flex align-items-center justify-content-center c col-4 rounded-circle">
        <h2 class="text-center text-white"><i class="fas fa-poll"></i> <br> {{ $total_stages }} <br> Dépôts</h2>
    </div>
      @endif
  </div>
<style>
    .c{
      height: 200px;
      width: 200px;
      line-height: 5px;
      background: #003F5C;
      transition: 1s cubic-bezier(0.215, 0.610, 0.355, 1) all;
    }
    .c:hover{
      background: #067F9F;
      cursor: wait;
    }
    .c h2{
      font-size: 24px;
    }
</style>
</div>
@endsection