<table class="table table-sm table-hover text-center">
    <thead class="active">
        <tr>
            <th>Entreprise</th>
            <th>Lieu</th>
            <th>Tuteur Stage</th>                          
            <th>Email Tuteur Stage</th>                          
            <th>Etudiant</th>                          
            <th>Email Etudiant</th>  
            <th>Enseignant suiveur</th> 
            <th>Enseignant suiveur matricule</th>                        
            <th>Debut Stage</th>                          
            <th>Fin stage</th>                                           
            <th>Date de décclaration</th>                                                             
        </tr>
    </thead>
    <tbody>
    @foreach($stages as $stage)
            <tr>
                <td>{{$stage->entreprise}}</td>   
                <td>{{$stage->lieu}}</td>  
                <td>{{$stage->tuteur_entreprise}}</td>   
                <td>{{$stage->tuteur_entreprise_email}}</td>   
                <td>{{$stage->etudiant->nom}} {{$stage->etudiant->prenom}}</td>   
                <td>{{$stage->etudiant->email}}</td>   
                <td>{{$stage->etudiant->email}}</td>   
                <td>{{$stage->etudiant->email}}</td>   
                <td>{{$stage->date_debut}}</td>   
                <td>{{$stage->date_fin}}</td>   
                <td>{{$stage->created_at}}</td>         
            </tr>
    @endforeach
    </tbody>
</table>
