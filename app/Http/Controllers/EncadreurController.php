<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Mail\DepotMail;
use App\Models\Enseignant;
use App\Exports\StageExport;
use App\Exports\StageVoeuExport;
use App\Exports\UsersExport;
use App\Mail\AffecterMail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class EncadreurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $req){
        $user = Auth::user();
        // verification de l'utilisateur garde 
        if($user->profil != 'Enseignant') {
            notify()->error("Vous n'avez pas  l'autorisation");
            return redirect('pages/home');
        }
        $enseignant = Enseignant::where('user_id','=',$user->id)->first();
        // dd($enseignant);
        if($enseignant->classes != null){
            $total_stages = $enseignant->classes->stages->count();
        }else{
            $total_stages = 0;
        }
    
       return view('encadreur.index',['enseignant' => $enseignant,'total_stages' => $total_stages]);
    }
    public function dashboard(){
        $user = Auth::user();
        $enseignant = Enseignant::where('user_id','=',$user->id)->first();
        //recup stages concernés 
        $stages = Stage::where('enseignant_id', '=', $enseignant->id)->get();
        return view('encadreur.dashboard',['stages' => $stages,'enseignant' => $enseignant]);
    }
    public function show(Stage $stage,$id)
    {   
        $user = Auth::user();
        $enseignant = Enseignant::where('user_id','=',$user->id)->first();
        $stage = Stage::find($id);
    //    $ens1 = DB::select('select matricule,nom,prenom from stages s,enseignants e where s.voeux_ens1 = e.id and e.id=?',[9]);
        $ens3 =Enseignant::find($stage->voeux_ens3);
        $ens2 =Enseignant::find($stage->voeux_ens2);
        $ens1 =Enseignant::find($stage->voeux_ens1);
        $encadreur = Enseignant::find($stage->enseignant_id);

        return view('encadreur.show', ['stage' => Stage::find($id),'ens1'=> $ens1, 'ens2' =>$ens2, 'ens3' => $ens3, 'encadreur'=> $encadreur,'enseignant' => $enseignant]);
    }
    public function affecterIndex(){
        $user = Auth::user();
        $enseignant = Enseignant::where('user_id','=',$user->id)->first();
        $stages = $enseignant->classes->stages;
        //test affectation
        return view('encadreur.affecter-index',['stages' => $stages,'enseignant' => $enseignant]);
    }
    public function affecter($id){
        $user = Auth::user();
        $enseignant = Enseignant::where('user_id','=',$user->id)->first();
        $enseignants = Enseignant::all();
        $stage = Stage::find($id);
        $voeu3 =Enseignant::find($stage->voeux_ens3);
        $voeu2 =Enseignant::find($stage->voeux_ens2);
        $voeu1 =Enseignant::find($stage->voeux_ens1);
        return view('encadreur.affecter',['enseignants'=>$enseignants,'id_stage' => $id,'stage' => $stage,'voeu1' => $voeu1,'voeu2' => $voeu2,'voeu3' => $voeu3,'enseignant' => $enseignant]);
    }
    public function affecterEtudiant(Request $request){
            // dd($request);
            $stage = Stage::find($request->id_stage);  
            $stage->enseignant_id=$request->choix;
            $etudiant = $stage->etudiant;
            $enseignant = $stage->enseignant;
            $stage->save();
            try {
                Mail::to($etudiant)->send(new AffecterMail($enseignant));
                notify()->success("Le mail est envoyé ");
            } catch (\Throwable $e) {
                $msg = $e->getMessage();
                notify()->warning("Le mail automatique n'est pas envoyé <br>");
            }
            notify()->success('Affectation encadreur reussie','Affectation');
            return redirect(route('encadreur-affecter-index'));
    }
    public function signer($id,Request $req){
        $user = Auth::user();
        $stage = Stage::find($id);
        $etud = $stage->etudiant;
        $enseignant = Enseignant::where('user_id','=',$user->id)->first();
        if($req->isMethod('GET')){
            return view('encadreur.signer',['enseignant' => $enseignant,'stage' => $stage]);
        }else{
            //recup du fichier 
              //upload fichier
                $fiche = $req->file('fiche');
                $ficheName = "Fiche-$etud->nom $etud->prenom _" . date("Y_m_d-H_i_s") . '.' . $fiche->extension();
                $fiche->move(\public_path('Fiches_Stages'),$ficheName);
                //supp de l'ancienne fiche
                if( $stage->fiche != null ){
                $fiche =public_path('Fiches_Stages/'.Stage::find($id)->fiche);
                unlink($fiche);    
                } 
                //signature du fichier 
                $stage->signe=true;
                $stage->fiche = $ficheName;
                $stage->save();
                //
                notify()->success('la signature a été effectuée avec succès','Signature');
                return back();
        }
    }
    public function print(){
        $enseignant = Enseignant::where('user_id','=',Auth::user()->id)->first();
        $stages = $enseignant->classes->stages;
        $pdf = PDF::loadView('encadreur.print',['stages' => $stages]);
        return $pdf->stream();
    }
    public function exportExcel(){
        $user = Auth::user();
        return Excel::download(new StageExport,"Fiche suivi stages $user->name.xlsx");
        
        // return Excel::download(new UsersExport,'Utilisateurs.pdf');
        // save excel file on app
        // return Excel::store(new UsersExport,'Utilisateurs.xlsx');
    }
    public function exportExcelVoeu(){

        $user = Auth::user();
        return Excel::download(new StageVoeuExport,"Fiche suivi stages voeux $user->name.xlsx");
        
        // return Excel::download(new UsersExport,'Utilisateurs.pdf');
        // save excel file on app
        // return Excel::store(new UsersExport,'Utilisateurs.xlsx');
    }
}
