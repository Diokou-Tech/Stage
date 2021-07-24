<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Etudiant;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        
        $this->middleware('auth');

        //$this->middleware(['profil:administrateur']);
    }
    public function affecter($id){
        $enseignants = Enseignant::all();
        $stage = Stage::find($id);
        $voeu3 =Enseignant::find($stage->voeux_ens3);
        $voeu2 =Enseignant::find($stage->voeux_ens2);
        $voeu1 =Enseignant::find($stage->voeux_ens1);
        return view('pages.affecter',['enseignants'=>$enseignants,'id_stage' => $id,'stage' => $stage,'voeu1' => $voeu1,'voeu2' => $voeu2,'voeu3' => $voeu3]);
    }
    public function affectere(Request $request){
        //affectation de l'encadreur
        $stage = Stage::find($request->id_stage);
        $stage->enseignant_id=$request->choix;
        $stage->save();
        notify()->success('Affectation encadreur reussie','Affectation');
        return redirect(route('page-stage'));
    }
    public function dashboard(){
        return view ('admin.dashboard');
    }
    public function home(){
        return view ('admin.home');
    }


    public function index(){
        return view('layouts.admin');
    }
    public function login(){
        return view('pages.login');
    }
    public function profil(){
        return view('pages.profil');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function stage(){
        $stages = Stage::orderBy('id','DESC')->paginate(4);;
        $total = Stage::count();
        return view('pages.Stage',['stages'=>$stages, 'total'=>$total]);
    }
    public function homeEtudiant(){
        return view('pages.home');
    }
    public function homeAdmin(){
        $total_ens = Enseignant::count();
        $total_etu = Etudiant::count();
        $total_sta = Stage::count();
        $total_par = Classe::count();

        return view('pages.accueil',['total_ens' => $total_ens,'total_etu' => $total_etu,'total_sta' => $total_sta,'total_par' => $total_par]);
    }
}
