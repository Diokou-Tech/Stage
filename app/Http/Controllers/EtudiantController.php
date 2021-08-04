<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreEtudiantRequest;
use App\Http\Requests\UpdateProfilEtudiant;
use App\Http\Requests\UpdateEtudiantRequest;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->profil !='Administrateur'){
            notify()->error("Vous n'avez pas  l'autorisation");
           return redirect('stages/');
        }else{
            $etudiants = Etudiant::orderBy('id','DESC')->get();;
            $total = Etudiant::count();
            return view('etudiants.index', ['etudiants'=>$etudiants, 'total'=>$total]);
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
         ##-- On selectionne tous les classes pour pouvoir les afficher au select input --##
         $classes = Classe::all();
         // Puis on renvoi la vue create avec la liste des classes
         return view('etudiants.create', ['classes'=>$classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEtudiantRequest $request)
    {
                //create user
                $user = new User();
                $user->name=$request->prenom." ".$request->nom;
                $user->email=$request->email;
                $user->profil= 'Etudiant';
                $user->password= Hash::make($request->password);
                $user->save();
        notify()->success("Creation d'un utilisateur avec succès","creation utilisateur");
                //create etudiant
                $etudiant = new Etudiant();
                $etudiant->matricule = $request->matricule;
                $etudiant->prenom = $request->prenom;
                $etudiant->nom = $request->nom;
                $etudiant->email = $request->email;
                $etudiant->portable = $request->portable;
                $etudiant->classe_id = $request->classe_id;
                $etudiant->user_id = $user->id;
                $etudiant->save();
        notify()->success("Creation d'un etudiant avec succès","creation etudiant");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // On trouve l'etudiant par ID
        $etudiant = Etudiant::find($id);
         ##-- On selectionne tous les classes pour pouvoir recuperer la classe d'tudiant les afficher au select box --##
         $classes = Classe::all();
         // Puis on renvoi la vue edit etudiant avec la liste des classes
         return view('etudiants.edit', ['etudiant'=>$etudiant,'classes'=>$classes]);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEtudiantRequest $request, $id)
    {
        //
        $etudiant = Etudiant::find($id);
        $etudiant->matricule = $request->matricule;
        $etudiant->prenom = $request->prenom;
        $etudiant->nom = $request->nom;
        $etudiant->email = $request->email;
        $etudiant->portable = $request->portable;
        $etudiant->classe_id = $request->classe_id;
        $etudiant->update();
        notify()->success("Modification effectuée avec succès","Mise à jour");
        return redirect(route('etudiant-index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Etudiant::find($id)->delete();
        notify()->success("Enregistrement supprimé avec succès.","suppression");
        return redirect(route('etudiant-index'));
    }
    public function profil(){
        $user = Auth::user();
        $etudiant = Etudiant::where('user_id', '=',$user->id)->first();
        // dd($etudiant);
        if(!empty($user)){
            return view('etudiants.profil', [
                'user'=>$user,
                'etudiant'=>$etudiant,
            ]);
        }
    }
    public function profil_update(){
        $user = Auth::user();
        $etudiant = Etudiant::where('user_id', '=',$user->id)->first();
        // dd($etudiant);
            if(!empty($user)){
                return view('etudiants.update-profil', [
                    'user'=>$user,
                    'etudiant'=>$etudiant,
                ]);
            }
        }
        public function update_profil(UpdateProfilEtudiant $request){
            $user = Auth::user();
            // $etudiant = Etudiant::where('user_id', '=',$id)->first();
            if($user){
                 $user->password= Hash::make($request->password);
                 $user->update();
                notify()->success(' Mise à jour effectué avec succès ');
                 return redirect(route('profil')); 
                 
             }else{
                notify()->error('Mise à jour non effectué.');
                 return redirect(route('enseignant-profil'));
             }
            }
}
