<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>E-mail</th>                          
            <th>Portable</th>                          
            <th>Entreprise</th>                          
            <th>Secteur d'activité</th>  
            <th>Lieu</th> 
            <th>Thème du stage </th>                        
            <th>Tuteur en entreprise</th>                          
            <th>Téléphone du tuteur en entreprise</th>                                           
            <th>E-mail du tuteur en entreprise</th>      
            <th>Date debut stage</th>
            <th>Date fin stage</th>
            <th>Enseignant suiveur souhaité</th>                                                                                                            
        </tr>
    </thead>
    <tbody>
    @foreach($stages as $stage)
            <tr>
                <td>{{$stage->etudiant->nom}}</td>
                <td> {{$stage->etudiant->prenom}}</td>   
                <td> {{$stage->etudiant->email}}</td>   
                <td> {{$stage->etudiant->portable}}</td>   
                <td>{{$stage->entreprise}}</td>   
                <td>{{$stage->secteur_activite}}</td>   
                <td>{{$stage->lieu}}</td>  
                <td>{{$stage->theme}}</td>  
                <td>{{$stage->tuteur_entreprise}}</td>   
                <td>{{$stage->tuteur_entreprise_tel}}</td>   
                <td>{{$stage->tuteur_entreprise_email}}</td>   
                <td>{{$stage->date_debut}}</td> 
                <td>{{$stage->date_fin}}</td>
                @if ($stage->enseignant_id != null)
                <td>{{ $stage->enseignant->nom }} {{ $stage->enseignant->prenom }} {{ $stage->enseignant->matricule }}</td>
                @endif 
            </tr>
    @endforeach
    </tbody>
</table>
