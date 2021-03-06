<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreClasseRequest;
use App\Http\Requests\UpdateClasseRequest;

class ClasseController extends Controller
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
        $classes = Classe::orderBy('id','DESC')->get();
        // dd($classes[0]);
        $total = Classe::count();
        return view('classes.index', ['classes'=>$classes, 'total'=>$total]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        ##-- On selectionne tous les enseignants pour pouvoir les afficher au select input--##
        $enseignants = Enseignant::all();
        // Puis on renvoi la vue create avec la liste des enseigants
        return view('classes.create', ['enseignants'=>$enseignants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClasseRequest $request)
    {
        //
        $classe = new Classe();
        $classe->nom = $request->nom;
        $classe->annee = $request->annee;
        $classe->niveau = $request->niveau;
        $classe->enseignant_id = $request->enseignant_id;
        $classe->save();
        notify()->success("Parcours ajouté avec succés","ajout");
        return redirect(route('classe-index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // Trouver l'ID de parcours ou classe à modifier
        $classe = Classe::find($id);

        $enseignants = Enseignant::all();
        return view('classes.edit', ['classe'=>$classe, 'enseignants'=>$enseignants]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClasseRequest $request, $id)
    {
        //
        $classe = Classe::find($id);
        $classe->nom = $request->nom;
        $classe->annee = $request->annee;
        $classe->niveau = $request->niveau;
        $classe->enseignant_id = $request->enseignant_id;
        $classe->update();
        notify()->success("Mise à jour de parcours effectué avec succés","Modification");
        return redirect(route('classe-index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Recherche par ID, le parcours à supprimer
        Classe::where('id',$id)->delete();
        notify()->success("Suppression de parcours effectué avec succés","Suppresion");
        return redirect(route('classe-index'))->with('success', 'Parcours sipprimé avce succès.');
    }
}
