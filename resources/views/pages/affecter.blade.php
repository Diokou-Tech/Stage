@extends('layouts.template')
@section('content')
<div class='container'>

    <div class="row justifu-contetent-center ml-10">
                       <h3 class="text-center">Affectation Encadreur</h3>
            <hr class="featurette-divider">
        </div>
        <form action="{{ route('affecter') }}" method="post" class="col-6 mx-auto">
            @csrf
            <div class="form-group mt-4">
                <label for="id_stage">Votre ID Stage</label>
                <input type="text" name="id_stage" id="id_stage" value="{{$id_stage}}" class="form-control" placeholder="Votre id">
            </div>
            <div class="form-group mt-4">
                <label for="choix" class="d-block">Choix de l'encadreur</label>
                <select name="choix" id="choix" class="form-control  @error('choix') is-invalid @enderror">
                    <option>Selectionner l'encadreur </option>
                        @foreach($enseignants as $responsable)
                        <option value="{{$responsable->id}}" @if($stage->enseignant_id == $responsable->id ) selected @endif> {{$responsable->matricule}} {{$responsable->nom}}</option>
                        @endforeach
                </select>
                @error('voeu1')
                <small>{{ $message }}  </small> 
                @enderror
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Affecter</button>
            </div>
        </form>

</div>
@endsection