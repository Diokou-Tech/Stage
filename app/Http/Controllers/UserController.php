<?php


namespace App\Http\Controllers;
use App\Models\Region;
use App\Models\Cercle;
use App\Models\Secteur;
use App\Models\District;
use App\Models\Bureau;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PDF;


class UserController extends Controller
{
    //

    
    public function __construct(){
        $this->middleware('auth');
       // $this->middleware(['user']);
    }

    public function index(Request $request){
        $p ="";
        $tot = User::count();
        $users = User::orderBy('id','DESC')->paginate(10);
        return view('users.index', ['users'=>$users, 'p'=>$p,'tot'=>$tot]);
    }


   

}
