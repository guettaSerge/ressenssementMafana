<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
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
            $genre = Genre::where('id', 'LIKE', "%$keyword%")
                ->orWhere('nom', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        }
        else {
            $genre = Genre::paginate($perPage);
        }

        return view('ressencement.genre.listegenre', compact('genre'));
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
        return view('ressencement.genre.addgenre',compact('error'));
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
            return redirect('/genre/create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art =new Genre();
                $art->nom=request("nom");
                $art->save();
                echo 'test';
                return redirect('/genre');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/genre/create?error='.$error);
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
        $genre = Genre::findOrFail($id);

        return view('genre.show', compact('genre'));
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
        $error="";
        if(request("error")!=null){
            $error=request("error");
        }
        $genre = Genre::findOrFail($id);
        return view('ressencement.genre.updategenre', compact('genre','error'));
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
            return redirect('/genre/edit?id='.$id)
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art =Genre::findOrFail($id);
                $art->nom=request("nom");
                $art->save();
                echo 'test';
                return redirect('/genre');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/genre/edit?id='.$id.' && error='.$error);
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
        Genre::destroy($id);

        return redirect('genre')->with('flash_message', 'Genre deleted!');
    }
}
