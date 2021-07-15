<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $stages = Stage::orderBy('id','DESC')->paginate(4);;
        $total = Stage::count();
        return view('pages.Stage',['stages'=>$stages, 'total'=>$total]);
    }
    public function homeEtudiant(){
        return view('pages.home');
    }
    public function homeAdmin(){
        return view('pages.accueil');
    }
}
