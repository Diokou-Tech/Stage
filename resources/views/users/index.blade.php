
@extends('layouts.template')
@section('content')
<div class='container'>
    <div class="row justifu-contetent-center ml-10">
        <div class="col-sm-0 col-md-6">
                <h4>{{$users->count()}} Utilisateurs </h4>
                <strong> </strong>
        </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-sm table-hover ">
                        <thead class="active">
                            <tr>
                                <!-- <th>id</th> -->
                                <th>ID</th>
                                <th>Adresse electronique</th>
                                <th>nom prenom</th>                       
                                <th>Profil</th>                       
                                <th>Actions</th>                          
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>   
                                    <td>{{$user->email}}</td>    
                                    <td> {{$user->profil}} </td>   
                                     
                                     <td class='d-flex'>
                                        <a href="{{ route('user-edit', ['id'=>$user->id])}}" class="btn btn-sm btn-primary m-1"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('user-destroy', ['id'=>$user->id])}}" class="btn btn-sm btn-danger m-1" onclick="return confirm('Voulez vous supprimer cet utilisateur ')"><i class="fas fa-trash"></i></a>
                                     </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</div>
@endsection