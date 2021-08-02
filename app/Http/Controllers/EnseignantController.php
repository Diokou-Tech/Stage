<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfilEtudiant;
use App\Http\Requests\StoreEnseignantRequest;
use App\Http\Requests\UpdateEnseignantRequest;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verif(){
        if(Auth::user()->profil !='administrateur'){
            notify()->error("Vous n'avez pas  l'autorisation");
           return redirect('stages/');
        }
    }
    public function index()
    {
        //
        if(Auth::user()->profil !='Administrateur'){
            notify()->error("Vous n'avez pas  l'autorisation");
           return redirect('stages/');
        }else{
            $enseignants = Enseignant::orderBy('id','DESC')->get();
            $total = Enseignant::count();
            return view('enseignants.index', ['enseignants'=>$enseignants, 'total'=>$total]);
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
       // echo "kkkkk";
        return view ('enseignants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnseignantRequest $request)
    {
        //
        $user = new User();
        $user->name=$request->prenom." ".$request->nom;
        $user->email=$request->email;
        $user->profil= 'Enseignant';
        $user->password= Hash::make($request->password);
        $user->save();

    
        $enseignant = new Enseignant();
        $enseignant->matricule = $request->matricule;
        $enseignant->prenom = $request->prenom;
        $enseignant->nom = $request->nom;
        $enseignant->email = $request->email;
        $enseignant->specialite = $request->specialite;
        $enseignant->portable = $request->portable;
        $enseignant->user_id = $user->id;
        $enseignant->save();

        Notify()->success('Creation de l\'enseignant reussie', 'Enseignant');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function show(Enseignant $enseignant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $enseignant = Enseignant::find($id);

        return view('enseignants.edit', ['enseignant'=>$enseignant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnseignantRequest $request, $id)
    {
        //
        $enseignant = Enseignant::find($id);
        $enseignant->matricule = $request->matricule;
        $enseignant->prenom = $request->prenom;
        $enseignant->nom = $request->nom;
        $enseignant->email = $request->email;
        $enseignant->specialite = $request->specialite;
        $enseignant->portable = $request->portable;
        $enseignant->update();
        notify()->success('success', 'Mise à jour effectué avec succès.');
        return redirect(route('prof-index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Enseignant::find($id)->delete();
        notify()->success('success', 'Enregistrement supprimé avec succès.');
        return redirect(route('prof-index'));
    }
    public function profil(){
        $user = Auth::user();
        $enseignant = Enseignant::where('user_id', '=',$user->id)->first();
        // dd($etudiant);
        if(!empty($user)){
            return view('enseignants.profil', [
                'user'=>$user,
                'enseignant'=>$enseignant,
            ]);
        }
    }
    public function profil_update(){
        $user = Auth::user();
        $enseignant = Enseignant::where('user_id', '=',$user->id)->first();
        // dd($etudiant);
            if(!empty($user)){
                return view('enseignants.update-profil', [
                    'user'=>$user,
                    'enseignant'=>$enseignant,
                ]);
            }
    }
    public function update_profil( UpdateProfilEtudiant $request){
        $user = Auth::user();
        if($user){
             $user->password= Hash::make($request->password);
             $user->update();
            notify()->success(' Mise à jour effectué avec succès ');
             return redirect(route('profil-enseignant')); 
             
         }else{
            notify()->error('Mise à jour non effectué.');
             return redirect(route('profil-enseignant'));
         }
    }
    
}
