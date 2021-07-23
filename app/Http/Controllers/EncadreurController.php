<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class EncadreurController extends Controller
{
    public function index(Request $req){
        $user = Auth::user();
        $enseignant = Enseignant::where('user_id','=',$user->id)->first();
       return view('encadreur.index',['enseignant' => $enseignant]);
    }
    public function dashboard(){
        $user = Auth::user();
        $enseignant = Enseignant::where('user_id','=',$user->id)->first();
        //recup stages concernés 
        $stages = Stage::where('enseignant_id', '=', $enseignant->id)->paginate(3);
        return view('encadreur.dashboard',['stages' => $stages]);
    }
    public function show(Stage $stage,$id)
    {   
        $stage = Stage::find($id);
    //    $ens1 = DB::select('select matricule,nom,prenom from stages s,enseignants e where s.voeux_ens1 = e.id and e.id=?',[9]);
        $ens3 =Enseignant::find($stage->voeux_ens3);
        $ens2 =Enseignant::find($stage->voeux_ens2);
        $ens1 =Enseignant::find($stage->voeux_ens1);
        $encadreur = Enseignant::find($stage->enseignant_id);

        return view('encadreur.show', ['stage' => Stage::find($id),'ens1'=> $ens1, 'ens2' =>$ens2, 'ens3' => $ens3, 'encadreur'=> $encadreur]);
    }
}
