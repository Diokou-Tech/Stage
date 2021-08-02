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
        $users = User::orderBy('id','DESC')->get();
        return view('users.index', ['users'=>$users]);
    }

    public function update(Request $request, $id){

        $validated = $request->validate ([
            'name' => 'bail|required',
            'email' => 'bail|required|email',
            'profil' => 'bail|required',
            'password' => 'bail|required|min:8|confirmed',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profil = $request->profil;
        $user->password = Hash::make($request->password);
        $user->save();
        notify()->success("Mise a jour de l'utilisateur avec succès.");
        return redirect(route('user-index'));
    }
    public function edit($id){
        $user = user::find($id);
        return view('users.edit',['user' => $user]);
    }
    public function destroy($id){
        try {
            User::find($id)->delete();
        } catch (\Throwable $th) {
            throw $th;
        }

        notify()->success("Suppression de l'utilisateur avec succès.");
        return back();
    }
}
