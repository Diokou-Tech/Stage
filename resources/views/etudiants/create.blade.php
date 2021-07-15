
@extends('layouts.template')
@section('content')
    <div class="container ">
        <div class="row d-flex justify-content-around">
            <div class="col-sm-12 col-md-6">
                <h4 data-toggle="modal" data-target="#staticBackdrop">Ajouter un etudiant</h4>
            </div>
                                          <!-- Modal -->
         <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Politique de confidentialité </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p class="text-justify">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur perferendis laborum obcaecati accusantium, ut dicta, magnam nobis repudiandae maxime, eligendi molestias? Inventore corporis officia soluta assumenda ab, quidem eaque exercitationem?
              Quas fugiat veritatis, et delectus distinctio dolores est nisi reprehenderit dolor minus, omnis quo, at asperiores. Quidem cum quisquam omnis, atque fugit aliquam libero necessitatibus, dolor possimus dolorem eligendi illum!
              Voluptates voluptatum odit non eius animi ipsam! Dolorum autem distinctio debitis modi consequatur error, et labore excepturi libero omnis in nemo fugiat quo sapiente, laborum sunt aliquam est. Vero, minima?
              Fugiat officiis fugit, consequatur vitae eveniet in at placeat dolore animi dignissimos! Laudantium a consequatur natus iure excepturi, pariatur labore, distinctio quam, vel possimus sed. Totam asperiores a iste reprehenderit.
              Tempore non soluta ex fuga labore facilis, laudantium ipsa quisquam corrupti qui praesentium autem quas reprehenderit minima nihil corporis ipsum sed aperiam fugiat totam ipsam. Nesciunt maxime expedita non voluptatem?
                </p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
            <div class="col-sm-12 col-md-6">
               <a href=" {{ route('etudiant-index')}} " class="btn btn-sm btn-outline-secondary float-right">Retour</a>
            </div>
            </div>

            <div class="row bg-white pt-3 mt-2 ">
                <div class="col-sm-12">
                    <h5>Informez les infos de l'etudiant:</h5>
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
                                <label for="name">Sexe:</label>
                                <input type="text" id="sexe" name="sexe" required class="form-control" placeholder="Sexe..."/>
                            </div>
                            <div class="form-group mt-2 mr-3">
                                <label for="name">Code Postal:</label>
                                <input type="text" id="code_postal" name="code_postal" required class="form-control" 
                                    placeholder="Code Postal..."/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mt-2 mr-3">
                                <label for="name">E-mail:</label>
                                <input type="email" id="email" name="email" required class="form-control" placeholder="Adresse e-mail..."/>
                            </div>
                            <div class="form-group mt-2 mr-3">
                                <label for="name">Numero portable:</label>
                                <input type="text" id="portable" name="portable" required class="form-control" placeholder="Numero de portable..."/>
                            </div>
                            <div class="form-group mt-2 mr-3">
                                <label for="name">Adresse:</label>
                                <input type="text" id="adresse" name="adresse" required class="form-control" placeholder="Adresse..."/>
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
                        </div>
                       

                        <div class="form-group float-left mt-2 mt-2">
                        <button type="submit" class="btn btn-md btn-primary" >Envoyer</button>
                        </div>

                    </form>
                </div>
            
            </div>

       
    </div><!--Fin de Container-->
@endsection