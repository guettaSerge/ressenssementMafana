<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\CategorieDon;
use Illuminate\Http\Request;

class CategorieDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $categoriedon = CategorieDon::where('id', 'LIKE', "%$keyword%")
                ->orWhere('nom', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $categoriedon = CategorieDon::latest()->paginate($perPage);
        }

        return view('categorie-don.index', compact('categoriedon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('categorie-don.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        CategorieDon::create($requestData);

        return redirect('categorie-don')->with('flash_message', 'CategorieDon added!');
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
        $categoriedon = CategorieDon::findOrFail($id);

        return view('categorie-don.show', compact('categoriedon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $categoriedon = CategorieDon::findOrFail($id);

        return view('categorie-don.edit', compact('categoriedon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $categoriedon = CategorieDon::findOrFail($id);
        $categoriedon->update($requestData);

        return redirect('categorie-don')->with('flash_message', 'CategorieDon updated!');
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
        CategorieDon::destroy($id);

        return redirect('categorie-don')->with('flash_message', 'CategorieDon deleted!');
    }
}
