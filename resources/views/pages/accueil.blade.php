@extends('layouts.template')
@section('content')
<div class="container">
    <h4>Mode Administrateur</h4>
    <hr>
    <div class="row d-flex justify-content-evenly">
      <div class="card shadow-lg  text-white d-flex align-items-center justify-content-center c col-4 rounded-circle">
       <h2 class="text-center text-white"> <i class="fas fa-user-graduate"></i> <br> {{$total_etu}} <br> Etudiants</h2>
      </div>
      <div class="card shadow-lg p-2  text-white d-flex align-items-center justify-content-center c col-4 rounded-circle">
        <h2 class="text-center text-white"> <i class="far fa-file-pdf"></i> <br>  {{$total_sta}} <br> Stages soumis</h2>
       </div>
       <div class="card shadow-lg p-2   text-white d-flex align-items-center justify-content-center c col-4 rounded-circle">
        <h2 class="text-center text-white"> <i class="fas fa-chalkboard-teacher"></i> <br>  {{$total_ens}}<br> Enseignants</h2>
       </div>
       <div class="card shadow-lg  text-white d-flex align-items-center justify-content-center c col-4 rounded-circle">
        <h2 class="text-center text-white"> <i class="fas fa-school"></i> <br>  {{$total_par}} <br> Parcours</h2>
       </div>
       <div class="card shadow-lg  text-white d-flex align-items-center justify-content-center c col-4 rounded-circle">
        <h2 class="text-center text-white"> <i class="fas fa-user"></i> <br>  {{$total_user }} <br> Utilisateurs</h2>
       </div>
    </div>
  </div>
  <style>
    .c{
      height: 200px;
      width: 200px;
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