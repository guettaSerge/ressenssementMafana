<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UtilisateurController extends Controller{
    const PERPAGE=10;
    public function login(){
        $error='';
        if(null !== request('error')){
            $error=request('error');
        }
        return view('ressencement.utilisateur.login',['error'=>$error]);
    }
    public static function verification(){
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
    }
    public function inscription(Request $req){
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
        $error='';
        if(null !== request('error')){
            $error=request('error');
        }
        return view('ressencement.utilisateur.inscription',['error'=>$error]);
    }

    public function signup_users(){
        return view('users.signup');
    }
    ////assignation à un point de vente//


    ///controlleurs///
    //inscription
    public function inscriptionController(Request $req){
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
        Utilisateur::verification();
        $validator = Validator::make($req->all(), [
            'nom' => 'required',
            'email' => 'required',
            'passe' => 'required',
            'confirm' => 'required'

        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/inscription')
                ->withErrors($validator)
                ->withInput();
        }
        else{

            try{
                if(request('passe')!=request('confirm'))
                    throw new \Exception('ces champs doivent etre egaux');
                    return UtilisateurController::inscription_user($req);
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $e->getMessage();
                return redirect('/inscription?error='.$error);
            }
        }
    }
    public function inscription_user(Request $req){
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
            Utilisateur::verification();
            $user=new Utilisateur();
            $user->nom=request('nom');
            $user->email=request('email');
            $user->passe=request('passe');
            $user->statut=request("isadmin");
            $user->save();
            return UtilisateurController::disconnect_users($req);
    }
    public function loginController(Request $req){
        $validator = Validator::make($req->all(), [
            'email' => 'required',
            'passe' => 'required'
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }
        else{

            try{
                $email =request('email');
                $mdp = request('passe');
                $user=Utilisateur::loginAndOrientation($email,$mdp);
                $req->session()->put('idUser',$user->id);
                $req->session()->put('statut',$user->statut);

                return redirect('/');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/login?error='.$error);
            }
        }
    }

    public function disconnect_users(Request $req){
        $req->session()->forget('idUser');
        $req->session()->forget('statut');
        return redirect('/');
    }
    public function listUtilisateur(){
        return view('mikolo.utilisateur.listeUtilisateur',['Utilisateur'=>Utilisateur::paginate(self::PERPAGE)]);
    }
    public function updateUtilisateur(){
        $error='';
        if(null !== request('error')){
            $error=request('error');

        }
        $id=request('id');
        $lap=Utilisateur::find($id);
        return view('mikolo.Utilisateur.updateUtilisateur',['error'=>$error,'Utilisateur'=>$lap]);
    }
    //controller
    public function addUtilisateurController(Request $req){
        Utilisateur::verification();
        $uri='/addUtilisateur';
        $and='';
        $isUpdate=false;
        if(null !== request('id')){
            $uri='/updateUtilisateur?id='.request('id');
            $and='&&';
            $isUpdate=true;
        }

        $validator = Validator::make($req->all(), [
            'nom' => 'required',
            'email' => 'required',
            'passe' => 'required',
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect($uri)->withErrors($validator)->withInput();
        }
        else{

            try{
                    if($isUpdate)return UtilisateurController::updateLap($req);
                    else return UtilisateurController::saveUtilisateur($req);
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $e->getMessage();
                return redirect($uri.$and.'?error='.$error);
            }
        }
    }
    public function saveUtilisateur(Request $req){
        Utilisateur::verification();
        $user=new Utilisateur();
        $user->nom=request('nom');
        $user->email=request('email');
        $user->passe=request('passe');
        $user->statut= request('isadmin');
        $user->save();
        $req->session()->put('statut',$user->statut);
        return redirect('/');
    }
    public function updateLap(Request $req){
            Utilisateur::verification();
            $user=Utilisateur::findOrFail(request('id'));
            $user->nom=request('nom');
            $user->email=request('email');
            $user->passe=request('passe');
            $user->save();
            return redirect('/');
    }

}
