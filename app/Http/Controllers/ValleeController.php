<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Vallee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UtilisateurController;

class ValleeController extends Controller
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
            $vallee = Vallee::where('id', 'LIKE', "%$keyword%")
                ->orWhere('nom', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $vallee = Vallee::paginate($perPage);
        }

        return view('ressencement.vallee.listevallee', compact('vallee'));
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
        return view('ressencement.vallee.addvallee',compact('error'));
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
            'nom' => 'required'
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/vallee/create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art =new Vallee();
                $art->nom=request("nom");
                $art->save();
                echo 'test';
                return redirect('/vallee');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/vallee/create?error='.$error);
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
        $vallee = Vallee::findOrFail($id);

        return view('vallee.show', compact('vallee'));
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
        $vallee = Vallee::findOrFail($id);
        $error="";
        if(request("error")!=null){
            $error=request("error");
        }

        return view('ressencement.vallee.updatevallee', compact('vallee','error'));
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
            'nom' => 'required'
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/vallee/edit?id='.$id)
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art =Vallee::findOrFail($id);
                $art->nom=request("nom");
                $art->save();
                echo 'test';
                return redirect('/vallee');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/vallee/edit?id='.$id.' && error='.$error);
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
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
        Vallee::destroy($id);

        return redirect('vallee')->with('flash_message', 'Vallee deleted!');
    }
}
