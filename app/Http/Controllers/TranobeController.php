<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Vallee;

use App\Models\Tranobe;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TranobeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');;
        $keyword = $request->get('nom');
        $perPage = 25;

        if (!empty($keyword)) {
            $tranobe = DB::table('vwvalleetranobee')
                ->Where('nom', 'LIKE', "%$keyword%")
                ->orWhere('nomvallee', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $tranobe = DB::table('vwvalleetranobee')->paginate($perPage);
        }

        return view('ressencement.tranobe.listetranobe', compact('tranobe'));
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
        $vallee=Vallee::all();
        return view('ressencement.tranobe.addtranobe',['error'=>$error,'vallee'=>$vallee]);
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
            'idvallee'=>'required'
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/tranobe/create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art =new Tranobe();
                $art->nom=request("nom");
                $art->idvallee=request("idvallee");
                $art->save();
                echo 'test';
                return redirect('/tranobe');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/tranobe/create? error='.$error);
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
        $tranobe = Tranobe::findOrFail($id);

        return view('tranobe.show', compact('tranobe'));
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
        $tranobe = Tranobe::findOrFail($id);
        $error="";
        if(request("error")!=null){
            $error=request("error");
        }
        $vallee=Vallee::all();
        return view('ressencement.tranobe.updatetranobe', compact('tranobe','error','vallee'));
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
            'idvallee'=>'required'
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/tranobe/edit?id='.$id)
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art =Tranobe::findOrFail($id);;
                $art->nom=request("nom");
                $art->idvallee=request("idvallee");
                $art->save();
                echo 'test';
                return redirect('/tranobe');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/tranobe/edit?id='.$id.' && error='.$error);
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
        Tranobe::destroy($id);

        return redirect('tranobe')->with('flash_message', 'Tranobe deleted!');
    }
}
