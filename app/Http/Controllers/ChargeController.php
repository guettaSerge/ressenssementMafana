<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Charge;

use App\Models\Personne;
use App\Models\PereFamille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ChargeController extends Controller
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
            $charge = DB::table('vwcharge')->where('idPereFamille', 'LIKE', "%$keyword%")
                ->orWhere('idPersonne', 'LIKE', "%$keyword%")
                ->orWhere('statut', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $charge = DB::table('vwcharge')->paginate($perPage);
        }
        return view('ressencement.charge.listecharge', compact('charge'));
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
            $error=request('error');
        }
        $perefamille=DB::table('vwaffperefamille')->get();
        //on doit changer ça en personne etant pas pere de famille et charge d'un autre personne
        $personne=DB::table('vwpotentielfilleul')->get();
        return view('ressencement.charge.addcharge',compact('error','perefamille','personne'));
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
            'idperefamille' => 'required',
            'idpersonne' => 'required'
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/charge/create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art =new Charge();
                $art->idperefamille=request("idperefamille");
                $art->idpersonne=request("idpersonne");
                $art->save();
                return redirect('/charge');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                //return redirect('/charge/create?error='.$error);
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
        $charge = Charge::findOrFail($id);

        return view('charge.show', compact('charge'));
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
        $error="";
        $id=request('id');
        $charge=  Charge::findOrFail($id);
        if(request("error")!=null){
            $error=request('error');
        }
        $perefamille=PereFamille::all();
        //on doit changer ça en personne etant pas pere de famille et charge d'un autre personne
        $personne=DB::table('vwpotentielparrain')->get();;
        return view('ressencement.charge.updatecharge',compact('charge','error','perefamille','personne'));
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
            'idperefamille' => 'required',
            'idpersonne' => 'required'
        ],[
            'required'=>'ce champ est obligatoire'
        ]);
        if ($validator->fails()) {
            return redirect('/charge/create?id='.$id)
                ->withErrors($validator)
                ->withInput();
        }
        else{
            try{
                $art =Charge::findOrFail($id);
                $art->idperefamille=request("idperefamille");
                $art->idpersonne=request("idpersonne");
                $art->save();
                return redirect('/charge');
            }
            catch(\Exception $e){
                $error=$e->getMessage();
                echo $error;
                return redirect('/charge/create?id='.$id.' && error='.$error);
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
        Charge::destroy($id);

        return redirect('charge')->with('flash_message', 'Charge deleted!');
    }
}
