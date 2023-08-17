<?php
namespace App\Http\Controllers;
use App\Models\ArchiveCourrierRecu;
use App\Models\CourrierRecu;
use Illuminate\Http\Request;
use App\Http\Request\ArchiveCourrierRecuRequest;
use Auth;

class ArchiveCourrierRecuController extends Controller
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
        $archiveCourrierRecus = ArchiveCourrierRecu::with('courrierRecu')->get();
        $archiveCourrierRecus = ArchiveCourrierRecu::paginate(5);
        return view('archiveCourrierRecus.index', compact('archiveCourrierRecus'));
    }

    public function search(Request $request)
    {
        $search_text = $_GET['query'];
        $archiveCourrierRecus = ArchiveCourrierRecu::where('name', 'LIKE', '%'.$search_text.'%')->get();

        return view('archiveCourrierRecus.search', compact('archiveCourrierRecus'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courrierRecus = CourrierRecu::all();
        return view('archiveCourrierRecus.create',compact('courrierRecus'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $archiveCourrierRecu = new ArchiveCourrierRecu();

        $archiveCourrierRecu->date_archivage = $request->post('date_archivage');
        $archiveCourrierRecu->id_courrR = $request->post('id_courrR');
        $archiveCourrierRecu->save();

        session()->flash('Add', 'La courrier a été ajouté avec succés ');
        return back();
        return redirect(route('archiveCourrierRecus.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ArchiveCourrierRecu $archiveCourrierRecu)
    {
        return view('archiveCourrierRecus.show', compact('archiveCourrierRecu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ArchiveCourrierRecu $archiveCourrierRecu)
    {

        $courrierRecus = CourrierRecu::all();
        return view('archiveCourrierRecus.edit',compact('archiveCourrierRecu', 'courrierRecus'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArchiveCourrierRecu $archiveCourrierRecu, Request $request)
    {
        $archiveCourrierRecu->date_archivage = $request->post('date_archivage');
        $archiveCourrierRecu->save();

        session()->flash('edit', ' La courrier a été modifié avec succes ');
        return back();
        return redirect(route('archiveCourrierRecus.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArchiveCourrierRecu $archiveCourrierRecu)
    {
        $archiveCourrierRecu->delete();

        return back()
            ->with('info', $archiveCourrierRecu->name . 'a été supprimé avec succée');
    }
}


