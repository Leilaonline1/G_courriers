<?php
namespace App\Http\Controllers;
use App\Models\CourrierRecu;
use App\Models\PieceJointe;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Request\CourrierRecuRequest;
use Auth;

class CourrierRecuController extends Controller
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
        $courrierRecus = CourrierRecu::with('pieceJointe', 'service')->get();
        $courrierRecus = CourrierRecu::paginate(5);
        return view('courrierRecus.index', compact('courrierRecus'));
    }

    public function search(Request $request)
    {
        $search_text = $_GET['query'];
        $courrierRecus = CourrierRecu::where('name', 'LIKE', '%'.$search_text.'%')->get();

        return view('courrierRecus.search', compact('courrierRecus'));

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
        return view('courrierRecus.create',compact('pieceJointes','services'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $courrierRecu = new CourrierRecu();
        $courrierRecu->type_courr = $request->post('type_courr');
        $courrierRecu->titre = $request->post('titre');
        $courrierRecu->objet = $request->post('objet');
        $courrierRecu->source = $request->post('source');
        $courrierRecu->destination = $request->post('destination');
        $courrierRecu->date = $request->post('date');
        $courrierRecu->etat = $request->post('etat');
        $courrierRecu->id_piece = $request->post('id_piece');
        $courrierRecu->id_service = $request->post('id_service');
        $courrierRecu->save();

        session()->flash('Add', 'La courrier a été ajouté avec succés ');
        return back();
        return redirect(route('courrierRecus.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CourrierRecu $courrierRecu)
    {
        return view('courrierRecus.show', compact('courrierRecu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CourrierRecu $courrierRecu)
    {
        $pieceJointes = PieceJointe::all();
        $services = Service::all();
        return view('courrierRecus.edit',compact('courrierRecu', 'pieceJointes','services'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourrierRecu $courrierRecu, Request $request)
    {
        $courrierRecu->type_courr = $request->post('type_courr');
        $courrierRecu->titre = $request->post('titre');
        $courrierRecu->objet = $request->post('objet');
        $courrierRecu->source = $request->post('source');
        $courrierRecu->destination = $request->post('destination');
        $courrierRecu->date = $request->post('date');
        $courrierRecu->etat = $request->post('etat');
        $courrierRecu->save();

        session()->flash('edit', ' La courrier a été modifié avec succes ');
        return back();
        return redirect(route('courrierRecus.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourrierRecu $courrierRecu)
    {
        $courrierRecu->delete();

        return back()
            ->with('info', $courrierRecu->name . 'a été supprimé avec succée');
    }
}


