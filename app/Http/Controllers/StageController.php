<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Enseignant;
use App\Models\Etudiant;
use Yoeunes\Notify\Notify;
use Illuminate\Http\Request;
use App\Http\Requests\StageRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $user  = Auth::user();
        //recuperation de l'étudiant
        $etud = Etudiant::where('user_id','=',$user->id)->first();

        if($user->profil !='Etudiant'){
        notify()->error("Vous n'avez pas  l'autorisation");
        return redirect('pages/accueil');
        }else{
            // $stages = Stage::orderBy('id','DESC');
            $stages = Stage::where('etudiant_id', '=', $etud->id)->paginate(3);
            // dd($stages);
            // $total = DB::table('stages')->where('etudiant_id', '=', $user->id)->count();
            $total =  Stage::where('etudiant_id', '=', $etud->id)->count();
            return view('stages.index', ['stages'=>$stages, 'total'=>$total]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $enseignants = Enseignant::all();
        $etudiants = Etudiant::all();
        return view('stages.create', ['etudiants'=>$etudiants, 'enseignants'=>$enseignants]);
    }
    public function offre()
    {
        return view('stages.offre');
    }

    public function contact()
    {
        return view('stages.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StageRequest $request)
    {
        //
                $etud = Etudiant::where('user_id','=',Auth::user()->id)->first();
                // dd($etud->classe);
                //upload fichier
                $fiche = $request->file('fiche');
                $ficheName = 'Fiche-'.date("Y_m_d-H_i_s").'.'.$fiche->extension();
                $fiche->move(\public_path('Fiches_Stages'),$ficheName);
                //$enfant->bulletin = $ficheName;
                Stage::create([
                    'fiche' => $ficheName,
                    'secteur_activite' => $request->secteur,
                    'entreprise' => $request->entreprise,
                    'lieu' => $request->lieu_stage,
                    'code_postal' => $request->code_postal,
                    'date_debut' => $request->debut_stage,
                    'date_fin' => $request->fin_stage,
                    'theme' => $request->theme_stage,
                    'cp' => $request->code_postal,
                    'tuteur_entreprise_email' => $request->tuteur_entreprise_email,
                    'tuteur_entreprise' => $request->tuteur,
                    'tuteur_entreprise_tel' => $request->telephone,
                    'voeux_ens1' => $request->voeu1,
                    'voeux_ens2' => $request->voeu2,
                    'voeux_ens3' => $request->voeu3,
                    'etudiant_id'  => $etud->id,
                    'classe_id'  => $etud->classe->id,
                    'enseignant_id'  => null
                ]);
               Notify()->success('Depot de stage reussi', 'Depôt');
                return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage,$id)
    {   
        $stage = Stage::find($id);
    //    $ens1 = DB::select('select matricule,nom,prenom from stages s,enseignants e where s.voeux_ens1 = e.id and e.id=?',[9]);
        $ens3 =Enseignant::find($stage->voeux_ens3);
        $ens2 =Enseignant::find($stage->voeux_ens2);
        $ens1 =Enseignant::find($stage->voeux_ens1);
        $encadreur = Enseignant::find($stage->enseignant_id);

        return view('stages.show', ['stage' => Stage::find($id),'ens1'=> $ens1, 'ens2' =>$ens2, 'ens3' => $ens3, 'encadreur'=> $encadreur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function edit(Stage $stage, $id)
    {
    //   dd(Stage::find($id));
    $enseignants = Enseignant::all();
        return view('stages.edit', ['stage' => Stage::find($id),'enseignants' => $enseignants]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $stage = Stage::find($id);
        //update
        $stage->entreprise= $request->entreprise;
        $stage->secteur_activite= $request->secteur;
        $stage->lieu= $request->lieu_stage;
        $stage->theme= $request->theme_stage;
        $stage->tuteur_entreprise= $request->tuteur;
        $stage->tuteur_entreprise_tel= $request->telephone;
        $stage->tuteur_entreprise_email= $request->tuteur_email;
        $stage->date_debut= $request->debut_stage;
        $stage->date_fin= $request->fin_stage;
        $stage->voeux_ens3= $request->voeu1;
        $stage->voeux_ens1= $request->voeu2;
        $stage->voeux_ens2= $request->voeu3;

        if( $request->file('fiche') != null){
            //supp fiche
           
            if($stage->fiche != null){
                $fiche =public_path('Fiches_Stages/'.$stage->fiche);
                file_exists($fiche);
                if(file_exists($fiche)){
                    unlink($fiche);
                }
            }
            // upload file
            $fiche = $request->file('fiche');
            $ficheName = 'Fiche-'.date("Y_m_d-H_i_s").'.'.$fiche->extension();
            $fiche->move(\public_path('Fiches_Stages'),$ficheName);
            $stage->fiche=$ficheName;
        }
        $stage->save();

        notify()->success('Modification  du depot stage reussi','Modification');
        return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage,$id)
    {
        //supp fiche 
        if( Stage::find($id)->fiche != null ){
            $fiche =public_path('Fiches_Stages/'.Stage::find($id)->fiche);
            unlink($fiche);    
        }

       Stage::find($id)->delete();
        notify()->success('Suppresion du stage avec succès','Suppresion');
        return back();
    }
}
