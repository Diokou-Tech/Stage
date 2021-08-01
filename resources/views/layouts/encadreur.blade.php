<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/datatables.min.css"/>
    <!-- Styles -->
    <!--LINK DE BOOTRAPS 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

</head>
<body>
     @notify_css
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-light text-white shadow-sm">
            <div class="container d-flex justify-content-between">
                <div class="col-2">
                    <a class="navbar-brand" href="{{ route('encadreur-index') }}">
                        <img src="{{asset('img/logo.gif') }} " height="50px" width=""/> 
                           <!-- {{ config('app.name','Laravel') }} -->
                        </a>    
                </div>
                <div class="collapse navbar-collapse col-10 d-flex justify-content-end" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                                 <li class="nav-item">
                                    <a class="nav-link @if(\Route::current()->getName() == 'encadreur-index') active  @endif" href="{{route('encadreur-index')}} "><i class="fas fa-house-user"></i>Accueil</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link @if(\Route::current()->getName() == 'encadreur-dashboard') active  @endif" href=" {{route('encadreur-dashboard')}} "><i class="fas fa-house-user"></i> Tableau de Bord</a>
                                </li>    
                                @if($enseignant->classes != null)
                                <li class="nav-item">
                                  <a class="nav-link @if(\Route::current()->getName() == 'encadreur-affecter-index') active  @endif" href=" {{route('encadreur-affecter-index')}} "><i class="fas fa-house-user"></i> Affectation </a>
                              </li> 
                                @endif      
                                <li class="nav-item">
                                  <a class="nav-link @if(\Route::current()->getName() == 'profil-enseignant') active  @endif" href=" {{route('profil-enseignant')}} "><i class="fa fa-user"></i> Profil</a>
                                </li>  
                                <!-- FIN -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle rounded" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                       <!--<i class="fas fa-user-slash"></i> {{ __('Quitter') }}-->
                                       <i class="fas fa-sign-out-alt"></i> {{('Deconnexion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                </div>
    <style>
      ul li{
        margin-right: 25px;
      }
      .active{
        background: #007396;
        color: white;
        border-radius:10px;
      }
      .active:hover{
          color: white;
          background: #026886;
      }
    </style>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>

<hr class="container">
<footer class="container">
    <div class="d-flex row  justify-content-between">
        <div class="col-lg-4">
        <h2>Contacts</h2>
        <ul type="none">
            <li><i class="fas fa-map-marker-alt"></i> Lorem, ipsum dolor, Lorem, ipsum. </li>
            <li><i class="fas fa-phone"></i> +33 434 2343 42332 </li>
            <li><i class="fas fa-globe"></i>  www.iaelyon.fr </li>
            <li>
            <span>Suivez-Nous : </span>
            <a href="#" class="h4 mr-4"><i class="fab fa-facebook"></i></a>
            <a href="#" class="h4 mr-4" ><i class="fab fa-twitter"></i></a>
            <a href="#" class="h4 mr-4" ><i class="fab fa-linkedin"></i></a>
            <a href="#" class="h4 mr-4" ><i class="fab fa-youtube"></i></a>
            <a href="#" class="h4 mr-4" ><i class="fab fa-instagram"></i></a>

             </li>
            {{-- <li><a href="{{ route('stage-contact') }}">Nous Contacter</a></li> --}}
        </ul>
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
        <div  class="col-lg-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis ad beatae ex! Illo doloribus voluptate reprehenderit similique velit sed voluptas laboriosam iusto, dicta provident illum atque possimus nemo, quidem voluptatibus?
        <button type="button" class="btn btn-outline " data-toggle="modal" data-target="#staticBackdrop">
            voir plus 
          </button>
        </div>
    </div>
    <h6 class="text-center bg-info text-white p-1">&copy;  Iae-Lyon <?php echo date('Y')  ?> </h6>
</footer>
    </div>
    
    @notify_js
    <!--Permet de definir les notification -->
    @notify_render
    <!--Permet de definir les notification -->
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
</body>
<script>
  $('select').select2({
  placeholder: 'Choix de l\'encadreur !',
  allowClear: true
});
    $('table').DataTable( {
        language: {
  "sEmptyTable": "Aucune donnée disponible dans le tableau",
  "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
  "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
  "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
  "sInfoThousands": ",",
  "sLengthMenu": "Afficher _MENU_ éléments",
  "sLoadingRecords": "Chargement...",
  "sProcessing": "Traitement...",
  "sSearch": "Rechercher :",
  "sZeroRecords": "Aucun élément correspondant trouvé",
  "oPaginate": {
    "sFirst": "Premier",
    "sLast": "Dernier",
    "sNext": "Suivant",
    "sPrevious": "Précédent"
  },
  "oAria": {
    "sSortAscending": ": activer pour trier la colonne par ordre croissant",
    "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
  },
  "select": {
    "rows": {
      "0": "Aucune ligne sélectionnée",
      "1": "1 ligne sélectionnée",
      "_": "%d lignes sélectionnées"
    }
  }
        },
        "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "Tout"]],
        "ordering": false,
    } );
</script>
</html>
