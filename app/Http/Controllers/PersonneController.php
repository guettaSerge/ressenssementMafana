<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests;

use App\Models\Personne;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function indexhtml(Request $request)
    {
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
        return view('ressencement.index');
    }
    public function index(Request $request)
    {
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
        $keyword = $request->get('search');
        $perPage = 25;
        $pers=DB::table('vwaffpersonne');
        if(request('nom')!=null){
            $pers->where('nom','like',"%".request('nom')."%");
        }
        if(request('prenom')!=null){
            $pers->where('prenom','like',"%".request('prenom')."%");
        }
        if(request('datenaissance')!=null){
            $pers->where('datenaissance','=',request('datenaissance'));
        }
        if(request('idgenre')!=null){
            $pers->where('idgenre','=',request('idgenre'));
        }
          $personne =$pers->paginate($perPage)->appends($request->url());
          $genre=Genre::all();
        return view('ressencement.personne.listepersonne', compact('personne','genre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
        $error="";
        if(request("error")!=null){
            $error=request("error");
        }
        $genre=Genre::all();
        return view('ressencement.personne.addpersonne',compact("error","genre"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $req)
    {
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
        $validator = Validator::make($req->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'datenaissance' => 'required',
            'idgenre' => 'required'
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/personne/create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art =new Personne();
                $art->nom=request("nom");
                $art->prenom=request("prenom");
                $art->datenaissance=request("datenaissance");
                $art->idgenre=request("idgenre");
                $art->nom=request("nom");
                $art->save();
                echo 'test';
                return redirect('/personne');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/personne/create?error='.$error);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $personne = Personne::findOrFail($id);

        return view('personne.show', compact('personne'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
        $id=request("id");
        $personne = Personne::findOrFail($id);
        $error="";
        if(request("error")!=null){
            $error=request("error");
        }
        $genre=Genre::all();
        return view('ressencement.personne.updatepersonne', compact('personne','genre','error'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $req)
    {
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
        $id=request("id");
        $validator = Validator::make($req->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'datenaissance' => 'required',
            'idgenre' => 'required'
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/personne/create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art = Personne::findOrFail($id);
                $art->nom=request("nom");
                $art->prenom=request("prenom");
                $art->datenaissance=request("datenaissance");
                $art->idgenre=request("idgenre");
                $art->save();
                return redirect('/personne');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/personne/create?error='.$error);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Personne::destroy($id);

        return redirect('personne')->with('flash_message', 'Personne deleted!');
    }
}
