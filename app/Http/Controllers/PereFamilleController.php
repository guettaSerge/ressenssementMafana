<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Tranobe;

use App\Models\Domicile;
use App\Models\Personne;
use App\Models\Profession;
use App\Models\PereFamille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PereFamilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
        $keyword = $request->get('search');
        $perPage = 25;
        $pere=DB::table('vwaffperefamille');
        if(request('nom')!=null){
            $pere->where('nom','like',"%".request('nom')."%");
        }
        if(request('prenom')!=null){
            $pere->where('prenom','like',"%".request('prenom')."%");
        }
        if(request('dateadmission')!=null){
            $pere->where('dateadmission','=',request('dateadmission'));
        }
        if(request('nomprofession')!=null){
            $pere->where('nomprofession','like',"%".request('nomprofession')."%");
        }
        if(request('nomtranobe')!=null){
            $pere->where('nomtranobe','like',"%".request('nomtranobe')."%");
        }
        if(request('nomvallee')!=null){
            $pere->where('nomvallee','like',"%".request('nomvallee')."%");
        }
        $perefamille = $pere->paginate($perPage);

        return view('ressencement.perefamille.listeperefamille', compact('perefamille'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
        $personne=DB::table('vwpotentielparrain')->get();
        $profession=Profession::all();
        $domicile=Domicile::all();
        $tranobe=Tranobe::all();
        $error="";
        if(request("error")!=null){
            $error=request('error');
        }
        return view('ressencement.perefamille.addperefamille',compact('error','personne','profession','domicile','tranobe'));
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
            'idpersonne' => 'required',
            'dateadmission' => 'required',
            'iddomicile' => 'required',
            'idprofession' => 'required',
            'idtranobe' => 'required'
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/perefamille/create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $perefamille =new PereFamille();
                $perefamille->idpersonne=request("idpersonne");
                $perefamille->dateadmission=request("dateadmission");
                $perefamille->iddomicile=request("iddomicile");
                $perefamille->idprofession=request("idprofession");
                $perefamille->idtranobe=request("idtranobe");
                $perefamille->save();
                echo 'test';
                return redirect('/perefamille');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                //return redirect('/perefamille/create?error='.$error);
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
        $perefamille = PereFamille::findOrFail($id);

        return view('pere-famille.show', compact('perefamille'));
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
        $id=request('id');
        $perefamille = PereFamille::findOrFail($id);
        $personne=Personne::all();
        $profession=Profession::all();
        $domicile=Domicile::all();
        $tranobe=Tranobe::all();
        $error="";
        if(request("error")!=null){
            $error=request('error');
        }
        return view('ressencement.perefamille.updateperefamille',compact('error','perefamille','personne','profession','domicile','tranobe'));
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
        $id=request('id');
        $validator = Validator::make($req->all(), [
            'idpersonne' => 'required',
            'dateadmission' => 'required',
            'iddomicile' => 'required',
            'idprofession' => 'required',
            'idtranobe' => 'required'
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/perefamille/edit?id='.$id)
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $perefamille =PereFamille::findOrFail($id);
                $perefamille->idpersonne=request("idpersonne");
                $perefamille->dateadmission=request("dateadmission");
                $perefamille->iddomicile=request("iddomicile");
                $perefamille->idprofession=request("idprofession");
                $perefamille->idtranobe=request("idtranobe");
                $perefamille->save();
                echo 'test';
                return redirect('/perefamille');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/perefamille/create?id='.$id.' && error='.$error);
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
        PereFamille::destroy($id);

        return redirect('pere-famille')->with('flash_message', 'PereFamille deleted!');
    }
}
