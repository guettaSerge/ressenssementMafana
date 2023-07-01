<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Region;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
        $keyword = $request->get('nom');
        $perPage = 25;
        if (!empty($keyword)) {
            $region = Region::where('nom', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $region = Region::paginate($perPage);
        }

        return view('ressencement.region.listeregion', compact('region'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $req)
    {
        if(session('idUser')==null) return redirect('/login?error=connectez vous d\'abord');
        $error="";
        if(request("error")!=null){
            $error=request("error");
        }
        return view('ressencement.region.addregion', compact("error"));
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
            return redirect('/region/create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art =new Region();
                $art->nom=request("nom");
                $art->save();
                echo 'test';
                return redirect('/region');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/region/create?error='.$error);
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
        $region = Region::findOrFail($id);
        return view('region.show', compact('region'));
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
        $region = Region::findOrFail($id);
        $error="";
        if(request("error")!=null){
            $error=request("error");
        }
        return view('ressencement.region.updateregion', compact("error","region"));
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
            return redirect('region/edit?id='.$id)
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art =Region::findOrFail($id);
                $art->nom=request("nom");
                $art->save();
                echo 'test';
                return redirect('/region');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/region/edit?id='.$id.' && error='.$error);
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
        Region::destroy($id);

        return redirect('region')->with('flash_message', 'Region deleted!');
    }
}
