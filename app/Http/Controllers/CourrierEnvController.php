<?php
namespace App\Http\Controllers;
use App\Models\CourrierEnv;
use App\Models\PieceJointe;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Request\CourrierEnvRequest;
use Auth;

class CourrierEnvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $courrierEnvs = CourrierEnv::with('pieceJointe', 'service')->get();
        $courrierEnvs = CourrierEnv::paginate(5);
        return view('courrierEnvs.index', compact('courrierEnvs'));
    }

    public function search(Request $request)
    {
        $search_text = $_GET['query'];
        $courrierEnvs = CourrierEnv::where('name', 'LIKE', '%'.$search_text.'%')->get();

        return view('courrierEnvs.search', compact('courrierEnvs'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pieceJointes = PieceJointe::all();
        $services = Service::all();
        return view('courrierEnvs.create',compact('pieceJointes','services'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $courrierEnv = new CourrierEnv();

        $courrierEnv->type_courr = $request->post('type_courr');
        $courrierEnv->objet = $request->post('objet');
        $courrierEnv->destination = $request->post('destination');
        $courrierEnv->source = $request->post('source');
        $courrierEnv->titre = $request->post('titre');
        $courrierEnv->date = $request->post('date');
        $courrierEnv->id_piece = $request->post('id_piece');
        $courrierEnv->id_service = $request->post('id_service');
        $courrierEnv->save();

        session()->flash('Add', 'La courrier a été ajouté avec succés ');
        return back();
        return redirect(route('courrierEnvs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CourrierEnv $courrierEnv)
    {
        return view('courrierEnvs.show', compact('courrierEnv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CourrierEnv $courrierEnv)
    {
        $pieceJointes = PieceJointe::all();
        $services = Service::all();
        return view('courrierEnvs.edit',compact('courrierEnv', 'pieceJointes','services'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourrierEnv $courrierEnv, Request $request)
    {
        $courrierEnv->type_courr = $request->post('type_courr');
        $courrierEnv->objet = $request->post('objet');
        $courrierEnv->destination = $request->post('destination');
        $courrierEnv->source = $request->post('source');
        $courrierEnv->titre = $request->post('titre');
        $courrierEnv->date = $request->post('date');
        $courrierEnv->save();

        session()->flash('edit', ' La courrier a été modifié avec succes ');
        return back();
        return redirect(route('courrierEnvs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourrierEnv $courrierEnv)
    {
        $courrierEnv->delete();

        return back()
            ->with('info', $courrierEnv->name . 'a été supprimé avec succée');
    }
}


