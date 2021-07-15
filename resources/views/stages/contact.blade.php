@extends('layouts.etudiant')
@section('content')
<div class='container d-flex justify-content-around'>
   <div class="row">
    <div class="col-4">
        <div class="card m-0" style="width: 17rem;">
            <img src="{{ asset('img/ghedira.jpg') }}" class="card-img-top rounded-lg" height="220px" width="220px" alt="...">
            <div class="card-body">
              <h5 class="card-title">Chirine Ghedira Ons</h5>
              <hr>
              <h6>Courriel : <b>chirine.ghedira@univ-lyon3.fr</b></h6>
              <h6>Telephone : <b>04 78 78 73 46</b></h6>
              <h6>Bureau : <b>3374</b></h6>
            </div>
          </div>
    </div>
    <div class="col-4">
        <div class="card m-0" style="width: 17rem;">
            <img src="{{ asset('img/bouzidi.jpg') }}" class="card-img-top rounded-lg" height="220px" width="220px" alt="Ghedira">
            <div class="card-body">
              <h5 class="card-title">Laid Bouzidi</h5>
              <hr>
              <h6>Courriel : <b>laid.bouzidi@univ-lyon3.fr</b></h6>
              <h6>Telephone : <b>04 78 78 73 46</b></h6>
              <h6>Bureau : <b>3352</b></h6>
            </div>
          </div>
    </div>
    <div class="col-4">
        <div class="card m-0" style="width: 17rem;">
            <img src="{{ asset('img/guilaine.jpg') }}" class="card-img-top rounded-lg" height="220px" width="220px" alt="...">
            <div class="card-body">
              <h5 class="card-title">Guilaine Talens</h5>
              <hr>
              <h6>Courriel : <b>guilaine.talens@univ-lyon3.fr</b></h6>
              <h6>Telephone : <b>04 78 78 73 46</b></h6>
              <h6>Bureau : <b>3379A</b></h6>
            </div>
          </div>
    </div>  

    </div>          
</div>
@endsection