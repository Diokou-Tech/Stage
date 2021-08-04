    <h4 align="center">Tableau affectation Etudiants du parcours <b> {{ $stages[0]->classe->nom }} {{ $stages[0]->classe->niveau }} </b></h4>
    <table class="table" border="1" cellspacing="0" cellspading="0">
        <thead>
            <tr>
                <th>Entreprise</th>
                <th>Tuteur Stage</th>                          
                <th>Etudiant</th>                                                
                <th>Debut Stage</th>                          
                <th>Fin stage</th>                          
                <th>Encadreur</th>                       
                <th>Date</th>                                                                                    
            </tr>
        </thead>
        <tbody>
        @foreach($stages as $stage)
                <tr>
                    <td>{{$stage->entreprise}}</td>    
                    <td>{{$stage->tuteur_entreprise}}</td>   
                    <td>{{$stage->etudiant->nom}} {{$stage->etudiant->prenom}}</td>   
                    <td>{{$stage->date_debut}}</td>   
                    <td>{{$stage->date_fin}}</td>
                    @if($stage->enseignant != null)
                    <td>{{ $stage->enseignant->nom }} {{ $stage->enseignant->prenom }} {{ $stage->enseignant->matricule }}</td>    
                    @else
                    <td class="text-danger">Non encadré(e)</td>    
                    @endif
                    <td>{{$stage->created_at}}</td>         
                </tr>
        @endforeach
        </tbody>
        <style>
            body{
                min-width: 100%;
                min-height: 100%;
                /* background: teal; 
                color: white;*/
            }
            .text-danger{
                color:red;
            }
            .table{
                text-align: center;
                width: 100%;
                font-size: 14px;    
            }
            .table td{
                width: 70px;
            }
            thead{
                background:teal;
                color: white;
            }
            th{
                padding: 5px;
            }
        </style>
    </table>

