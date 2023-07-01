<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Region;

use App\Models\Domicile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DomicileController extends Controller
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

        if (!empty($keyword)) {
            $domicile = Domicile::where('id', 'LIKE', "%$keyword%")
                ->orWhere('nom', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $domicile = Domicile::paginate($perPage);
        }

        return view('ressencement.domicile.listedomicile', compact('domicile'));
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
        $region=Region::all();
        return view('ressencement.domicile.adddomicile',compact('error','region'));
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
            'idregion' => 'required'
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/domicile/create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art =new Domicile();
                $art->nom=request("nom");
                $art->idregion=request("idregion");
                $art->save();
                echo 'test';
                return redirect('/domicile');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/domicile/create?error='.$error);
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
        $domicile = Domicile::findOrFail($id);

        return view('domicile.show', compact('domicile'));
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
        $domicile = Domicile::findOrFail($id);
        $error="";
        if(request("error")!=null){
            $error=request("error");
        }
        $region=Region::all();
        return view('ressencement.domicile.updatedomicile', compact('domicile','error','region'));
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
            'idregion' => 'required'
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/domicile/edit?id='.$id)
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art = Domicile::findOrFail($id);
                $art->nom=request("nom");
                $art->idregion=request("idregion");
                $art->save();
                echo 'test';
                return redirect('/domicile');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/domicile/edit?id='.$id.' && error='.$error);
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
        Domicile::destroy($id);

        return redirect('domicile')->with('flash_message', 'Domicile deleted!');
    }
}
