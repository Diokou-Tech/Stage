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
            <th>Prof encadreur souhaite</th>                                                                                                               
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
                <td>
                    {{ $tabEns[$stage->voeux_ens1] }}
                    @isset( $tabEns[$stage->voeux_ens2])
                    , {{ $tabEns[$stage->voeux_ens2] }} 
                    @endisset  
                    @isset( $tabEns[$stage->voeux_ens3])
                    , {{ $tabEns[$stage->voeux_ens3] }}
                    @endisset
                </td>                                                                                           
                <td></td>
                <td></td>
            </tr>
    @endforeach
    </tbody>
</table>
