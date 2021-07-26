@extends('layouts.encadreur')
@section('content')
<div class='container'>
    <div class=" border-0 m-0 col-4"> 
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb border-0">
              <li class="breadcrumb-item "><a href="{{ route('encadreur-affecter-index')}}">Affectation</a></li>
              <li class="breadcrumb-item" aria-current="page">signature</li>
            </ol>
        </nav>   
    </div>
    <hr>
    <div class="row justify-content-center align-items-center">   
        <div class="col-lg-6 col-md-8 mx-auto">
            <ul class="list-group-flush">
                @if($stage->signe == false)
                <li class="list-group-item text-success"><a target="_blank" download="{{ $stage->fiche }}" href="../../../../Fiches_Stages/{{ $stage->fiche }}" class="text-dark">Télécharger la Fiche non signée</a></li>                    
                @else
                <li class="list-group-item text-success"> Cette fiche a déjà été signée <br> <a target="_blank" download="{{ $stage->fiche }}" href="../../../../Fiches_Stages/{{ $stage->fiche }}" class="text-dark">Fiche signée</a></li>                      
                @endif
                <li class="list-group-item">
                    <form action="{{ route('encadreur-signer',['id'=>$stage->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="fiche_signe">La fiche signée</label>
                            <input type="file" name="fiche" id="fiche" class="form-control" required accept=".pdf">
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary btn-lg"> <i class="fas fa-signature"></i> Signer</button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection