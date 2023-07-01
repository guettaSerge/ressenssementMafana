<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model{
    protected $table = 'utilisateur';
    public $timestamps = false;
    public $orientation;
    use HasFactory;
    public static function login($email,$mdp){
        $tab=Utilisateur::fromQuery("select *From utilisateur where Email='".$email."' and passe='".$mdp."'  limit 1");
        $id=0;
        if(count($tab)==0){
           throw  new \Exception("votre email ou mot de passe est incorrecte");
        }
        return $tab[0]['id'];

    }
    public static function loginAndOrientation($email,$mdp){
        $id=Utilisateur::login($email,$mdp);
        $user=Utilisateur::find($id);
        return $user;
    }

    //////recuperation des variables de sessions
    public static function getUserInfo(){
        $id['idUser']=session('idUser');
        $id['statut']=session('statut');
        return $id;
    }
    public static function verification(){
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
    }
    public static function verificationSuperUser(){
        Utilisateur::verification();
        if(session('statut')==null) return redirect('/frontoffice?error=acces interdit');
    }
}
