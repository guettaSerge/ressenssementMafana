<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Profession;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProfessionController extends Controller
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
            $profession = Profession::where('id', 'LIKE', "%$keyword%")
                ->orWhere('nom', 'LIKE', "%$keyword%")
                ->orWhere('nivVulnerabilite', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $profession = Profession::paginate($perPage);
        }

        return view('ressencement.profession.listeprofession', compact('profession'));
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
        if(request('error')!=null){
            $error=request('error');
        }
        return view('ressencement.profession.addprofession',compact('error'));
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
            'nivVulnerabilite' => 'required'
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/profession/create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art =new Profession();
                $art->nom=request("nom");
                $art->nivvulnerabilite=request("nivVulnerabilite");
                $art->save();
                echo 'test';
                return redirect('/profession');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                //return redirect('/profession/create?error='.$error);
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
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
        $profession = Profession::findOrFail($id);

        return view('profession.show', compact('profession'));
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
        $profession = Profession::findOrFail($id);
        $error="";
        if(request('error')!=null){
            $error=request('error');
        }
        return view('ressencement.profession.updateprofession', compact('profession','error'));
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
            'nivVulnerabilite' => 'required'
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/profession/edit?id='.$id)
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art =Profession::findOrFail($id);
                $art->nom=request("nom");
                $art->nivvulnerabilite=request("nivVulnerabilite");
                $art->save();
                echo 'test';
                return redirect('/profession');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/profession/edit?id='.$id.' && error='.$error);
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
        Profession::destroy($id);

        return redirect('profession')->with('flash_message', 'Profession deleted!');
    }
}
