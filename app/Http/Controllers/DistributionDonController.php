<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\DistributionDon;
use Illuminate\Http\Request;

class DistributionDonController extends Controller
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
            $distributiondon = DistributionDon::where('idPereFamille', 'LIKE', "%$keyword%")
                ->orWhere('idDon', 'LIKE', "%$keyword%")
                ->orWhere('dateDistribution', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $distributiondon = DistributionDon::latest()->paginate($perPage);
        }

        return view('distribution-don.index', compact('distributiondon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('distribution-don.create');
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
        
        DistributionDon::create($requestData);

        return redirect('distribution-don')->with('flash_message', 'DistributionDon added!');
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
        $distributiondon = DistributionDon::findOrFail($id);

        return view('distribution-don.show', compact('distributiondon'));
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
        $distributiondon = DistributionDon::findOrFail($id);

        return view('distribution-don.edit', compact('distributiondon'));
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
        
        $distributiondon = DistributionDon::findOrFail($id);
        $distributiondon->update($requestData);

        return redirect('distribution-don')->with('flash_message', 'DistributionDon updated!');
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
        DistributionDon::destroy($id);

        return redirect('distribution-don')->with('flash_message', 'DistributionDon deleted!');
    }
}
