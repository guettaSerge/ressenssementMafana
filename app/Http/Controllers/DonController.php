<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Don;
use Illuminate\Http\Request;

class DonController extends Controller
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
            $don = Don::where('id', 'LIKE', "%$keyword%")
                ->orWhere('nom', 'LIKE', "%$keyword%")
                ->orWhere('idCategDon', 'LIKE', "%$keyword%")
                ->orWhere('nivVulnerabilite', 'LIKE', "%$keyword%")
                ->orWhere('minage', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $don = Don::latest()->paginate($perPage);
        }

        return view('don.index', compact('don'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('don.create');
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
        
        Don::create($requestData);

        return redirect('don')->with('flash_message', 'Don added!');
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
        $don = Don::findOrFail($id);

        return view('don.show', compact('don'));
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
        $don = Don::findOrFail($id);

        return view('don.edit', compact('don'));
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
        
        $don = Don::findOrFail($id);
        $don->update($requestData);

        return redirect('don')->with('flash_message', 'Don updated!');
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
        Don::destroy($id);

        return redirect('don')->with('flash_message', 'Don deleted!');
    }
}
