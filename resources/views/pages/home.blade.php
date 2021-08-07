@extends('layouts.etudiant')
@section('content')
<div class="container mt-4">
    <div class="row  d-flex jusify-content-between align-items-center">
    <h4 class="text-center">Bienvenue {{  Str::ucfirst(Auth::user()->name)  }}  </h4>
    <h4><a href="../../fichiers/fiche.doc" class="nav-link mav-item"><i class="fa fa-download"></i> Fiche de renseignement vierge </a></h4>
    <hr>
    <div class="row">
        <div class="col-6 shadow-lg p-2 rounded">
            <h5>Depot</h5>
            <p align="justify" >
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit libero error fugiat, nihil labore quas ex voluptas unde maxime voluptatum aliquam culpa ratione harum vitae pariatur officia? Eos, ab ipsa.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quam maiores ipsum officiis excepturi doloribus consequuntur, modi ipsam amet suscipit aliquid quae! Est unde, a reprehenderit aspernatur quam sequi dicta?
            </p>
        </div>
        <div class="col-6 shadow-lg p-2 rounded">
            <h5>Tableau de Bord</h5>
            <p align="justify">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem delectus nam laudantium nisi aut. Cumque debitis repudiandae molestias inventore a amet totam quia ea ipsa voluptate commodi, alias reiciendis repellat.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quam maiores ipsum officiis excepturi doloribus consequuntur, modi ipsam amet suscipit aliquid quae! Est unde, a reprehenderit aspernatur quam sequi dicta?
            </p>
        </div>
        <div class="col-6 shadow-lg p-2 rounded">
            <h5>Offre d'emploi </h5>
            <p align="justify">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id rerum ea doloremque, culpa exercitationem aliquid iusto voluptatum totam velit at! Fugiat delectus perferendis cum dicta similique quos iste quis aspernatur.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quam maiores ipsum officiis excepturi doloribus consequuntur, modi ipsam amet suscipit aliquid quae! Est unde, a reprehenderit aspernatur quam sequi dicta?
            </p>
        </div>
        <div class="col-6 shadow-lg p-2 rounded">
            <h5> Contact </h5>
            <p  align="justify">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae tempore iusto perspiciatis voluptates velit, consectetur fugiat accusantium? Porro, at deleniti similique dignissimos, provident impedit excepturi dolore quos fuga reprehenderit expedita.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quam maiores ipsum officiis excepturi doloribus consequuntur, modi ipsam amet suscipit aliquid quae! Est unde, a reprehenderit aspernatur quam sequi dicta?
            </p>
        </div>
        <div class="col-6 shadow-lg p-2 rounded">
            <h5>Profil</h5>
            <p  align="justify">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam dolorum ab ducimus voluptas possimus. Consectetur, quos? Placeat sequi hic eveniet beatae cupiditate unde aperiam nobis magni commodi, modi, ab labore.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quam maiores ipsum officiis excepturi doloribus consequuntur, modi ipsam amet suscipit aliquid quae! Est unde, a reprehenderit aspernatur quam sequi dicta?
            </p>
        </div>
    </div>
</div>
@endsection