<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stage;
use App\Models\Classe;
use App\Models\Etudiant;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        
        $this->middleware('auth');

        //$this->middleware(['profil:administrateur']);
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
        $stages = Stage::orderBy('id','DESC')->paginate(10);;
        $total = Stage::count();
        return view('pages.Stage',['stages'=>$stages, 'total'=>$total]);
    }
    public function homeEtudiant(){
        $user = Auth::user();
        if( $user->created_at == $user->updated_at ){
            return redirect(route('profil'));
        }
        return view('pages.home');
    }
    public function homeAdmin(){
        $total_ens = Enseignant::count();
        $total_etu = Etudiant::count();
        $total_sta = Stage::count();
        $total_par = Classe::count();
        $total_user = User::count();
        return view('pages.accueil',['total_ens' => $total_ens,'total_etu' => $total_etu,'total_sta' => $total_sta,'total_par' => $total_par,'total_user' => $total_user]);
    }
}
